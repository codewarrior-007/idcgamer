<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Model\User;
use App\Model\UserStatusHistory;
use Log;

class AccountController extends Controller
{
    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => ['bail', 'required', 'max:255'],
            'email' => ['bail', 'required', 'email:filter', 'max:255'],
            'hash' => ['required'],
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        if (!$authKey = config('system.authkey', null)) {
            Log::error("ACCOUNT ERROR: Authkey not set in env or system config.");
            abort(404);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $hmacUser = $request->input('hash');
        $hmacSystem = hash_hmac('sha512', "{$name}|{$email}", $authKey);

        if ($hmacUser != $hmacSystem) {
            Log::error("ACCOUNT ERROR: Inbound request failed HMAC check.");
            abort(404);
        }

        if (User::where('email', '=', $email)->exists()) {
            Log::error("ACCOUNT ERROR: User with email {$email} already exists.");
            abort(404);
        }

        $hash = hash('sha512', Str::random(128).time());

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($hash);
        $user->hash = $hash;
        $user->status = UserStatusHistory::STATUS_REGISTER;
        $user->type = UserStatusHistory::USER_TYPE_DEFAULT;

        $status = new UserStatusHistory;
        $status->user_id = $user->id;
        $status->status = UserStatusHistory::STATUS_REGISTER;
        $status->save();

        if (!$user->save()) {
            Log::error("ACCOUNT ERROR: Unable to save user record for {$email}.");
            abort(404);
        }

        return response()->json(['hash' => $user->hash]);

    }
}
