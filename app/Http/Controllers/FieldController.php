<?php

namespace App\Http\Controllers;

use Log;
use File;
use App\Models\User;
use Defuse\Crypto\Key;
use App\Models\FormPage;
use App\Models\FormField;
use App\Models\UserEntry;
use Defuse\Crypto\Crypto;
use App\Models\FormOption;
use App\Models\FormSection;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    public function getOptions(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'hash' => ['bail', 'required', 'max:255'],
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        $hash = $request->input('hash');
        $hashArray = is_array($hash) ? $hash : [$hash];

        $ret = [];

        foreach($hashArray as $hash) {

            if (!$field = FormField::where('hash', $hash)->first()) {
                Log::error("FIELD ERROR: Could not find form field with hash {$hash}.");
                // abort(404);
                continue;
            }

            if (!$field->options()->exists()) {
                Log::error("FIELD ERROR: Form field with id of {$field->id} has no options.");
                // abort(404);
                continue;
            }

            $options = [];

            foreach ($field->options()->orderBy('sort')->get() as $option) {
                $options[] = $option->fetchFormatted();
            }

            $ret[$hash] = $options;

        }

        return response()->json($ret);
    }

    public function saveField(Request $request) 
    {
        // TODO: use a logged in user session to retrieve the user id
        // For our current place in dev, we'lluse our seeded user
        // $userId = Auth::id();
        $user = User::where('name', 'Test User')->first();
        $userId = $user->id;

        $validator = Validator::make($request->all(), [
            'hash' => ['bail', 'required', 'max:255'],
            'value' => ['bail', 'required', 'max:255'],
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        $hash = $request->input('hash');

        if (!$field = FormField::where('hash', $hash)->first()) {
            Log::error("FIELD ERROR: Could not find form field with hash {$hash}.");
            abort(404);
        }
        
        $value = $request->input('value');
        $valueArray = (is_array($value) ? $value : [$value]);
        $sort = 0;

        // check for encryption key
        if (!$key = self::getKey()) {
            abort(404);
        }

        foreach ($valueArray as $singleValue) {

            if ($field->isSecure()) {
                $singleValue = Crypto::encrypt($singleValue, $key);
            }

            UserEntry::updateOrCreate([
                'user_id' => $userId,
                'hash' => $hash,
                'sort' => $sort
            ],[
                'value' => $singleValue ?? "",
                'sort' => $sort++,
            ]);

        }

        return response()->json(['status' => 'ok']);
    }

    private static function getKey() 
    {
        $secureKey = config('system.securekey', null);

        if (is_null($secureKey)) {
            Log::error("FIELD ERROR: System secure key not set.");
            return false;
        }

        return Key::loadFromAsciiSafeString($secureKey);
    }

    public function fileUpload(Request $request) {
		$request->validate(array(
		    'file' => 'image|max:300000',
		));

		$file = $request->file('file');

        $upload_success = $file->store('uploads');

        if( $upload_success ) {
        	return response()->json('success', 200);
        } else {
        	return response()->json('error', 400);
        }
	}
}
