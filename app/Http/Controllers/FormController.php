<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\FormField;
use App\Models\FormOption;
use App\Models\FormSection;
use App\Models\FormPage;
use App\Models\UserEntry;
use App\Models\User;
use Log;

class FormController extends Controller
{
    public function view(Request $request) {

        // TODO: Rework this endpoint to pull from active user account
        // this setup is temporary for now  while in early development

        $validator = Validator::make($request->all(), [
            'step' => ['bail', 'required', 'max:255'],
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        $step = $request->input('step');
        if (!$page = FormPage::where('step_ident', $step)->first()) {
            Log::error("FORM ERROR: Could not find form page with step ident {$step}.");
            abort(404);
        }

        // TODO: Properly infer user id from session or ident hash
        // for now, we'll just pull our test user from seeder

        $user = User::where('name', 'Test User')->first();
        $sortedEntries = [];

        if ($userEntries = UserEntry::where('user_id', $user->id)->get()) {
            foreach ($userEntries as $userEntry) {
                $sortedEntries[$userEntry->hash][$userEntry->sort] = $userEntry->value;
            }
        }

        $pageContent = $page->fetchFormatted();

        foreach ($pageContent['sections'] as &$pageSection) {
            if (!isset($pageSection) || !isset($pageSection['fields'])) {
                continue;
            }
                
            foreach ($pageSection['fields'] as &$pageField) {
                $returnValue = '';
                if (isset($sortedEntries[$pageField['hash']])) {
                    if ($pageField['is_secure'] == 1) {
                        $returnValue = config('system.secure-placeholder');
                    } else {
                        $returnValue = (sizeof($sortedEntries[$pageField['hash']]) > 1 ? $sortedEntries[$pageField['hash']] : $sortedEntries[$pageField['hash']][0]);
                    }
                }
                $pageField['value'] = $returnValue;
            }
        }

        return response()->json($pageContent);
    }
}
