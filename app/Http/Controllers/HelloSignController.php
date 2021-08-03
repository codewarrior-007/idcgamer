<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserSignature;
use App\Models\User;
use HelloSign;
use Log;

class HelloSignController extends Controller
{
    public function viewform(Request $request) {

        // TODO: Scope form request to specific user and form request
        // additional information at: https://github.com/hellosign/hellosign-php-sdk

        // build client object
        $client = new HelloSign\Client(config('hellosign.keys.api_key', null));
        $clientId = config('hellosign.keys.client_id', null);

        // get account id
        $account = $client->getAccount();
        $accountId = $account->getId();

        // start request
        $request = new HelloSign\TemplateSignatureRequest;
        $request->enableTestMode();
        $request->setTemplateId(config('hellosign.templates.independent-contractor-agreement'));
        $request->setSubject('Purchase Order');

        // TODO: Implement user session, currently pulling seeded user
        $user = User::where('name', 'Test User')->first();
        $userName = $user->name;
        $userEmail = $user->email;

        // Link to potential user email
        $request->setSigner(userSignature::ROLE_RECRUIT, $userEmail, $userName);

        // Turn it into an embedded request
        $embeddedRequest = new HelloSign\EmbeddedSignatureRequest($request, $clientId);

        // Send it to HelloSign
        $response = $client->createEmbeddedSignatureRequest($embeddedRequest);

        // grab the signature ID for the signature page that will be embedded in our page (for the demo, we'll just use the first one)
        $signatures = $response->getSignatures();
        $signatureId = $signatures[0]->getId();

        // create new signature row
        $userSignature = new UserSignature;
        $userSignature->user_email = $userEmail;
        $userSignature->signature_id = $signatureId;
        $userSignature->account_id = $accountId;
        $userSignature->app_id = $clientId;
        $userSignature->event_type = UserSignature::TYPE_EPOCH;

        // retrieve the URL to sign the document
        $response = $client->getEmbeddedSignUrl($signatureId);

        // store it to use with the embedded.js HelloSign.open() call
        $signUrl = $response->getSignUrl();

        // check if record saved properly
        if (!$userSignature->save()) {
            Log::error("HELLO SIGN ERROR: Could not save user signature for user email {$userEmail} with signature id of {$signatureId}");
            abort(404);
        }

        // return data
        return response()->json([
            'clientId' => $clientId,
            'signUrl' => $signUrl,
        ]);

    }

    public function callback(Request $request) {

        // start validator
        $validator = Validator::make($request->all(), [
            'json' => ['bail', 'required'],
        ]);

        // check validator
        if ($validator->fails()) {
            Log::error("HELLO SIGN ERROR: Callback did not have json field in POST data.");
            abort(404);
        }

        // pull json from post data
        $jsonRaw = $request->input('json');
        $json = json_decode($jsonRaw);

        // check if json decode is null
        if (is_null($json)) {
            Log::error("HELLO SIGN ERROR: JSON field malformed.");
            abort(404);
        }

        // create signature object
        try {

            $userSignature = new UserSignature;
            $userSignature->event_type = (isset($json->event->event_type) ? $json->event->event_type : '');
            $userSignature->event_time = (isset($json->event->event_time) ? $json->event->event_time : '');
            $userSignature->event_hash = (isset($json->event->event_hash) ? $json->event->event_hash : '');
           
            // meta fields
            $userSignature->event_message    = (isset($json->event->event_metadata->event_message) ? $json->event->event_metadata->event_message : '');
            $userSignature->signature_id     = (isset($json->event->event_metadata->related_signature_id) ? $json->event->event_metadata->related_signature_id : '');
            $userSignature->account_id       = (isset($json->event->event_metadata->reported_for_account_id) ? $json->event->event_metadata->reported_for_account_id : '');
            $userSignature->app_id           = (isset($json->event->event_metadata->reported_for_app_id) ? $json->event->event_metadata->reported_for_app_id : '');

        } catch (\Exception $e) {
            Log::error($e);
            abort(404);
        }

        // TODO: Enable or disable hash verification based on environment
        // callback_test event payload will not always validate for some reason
        if (app()->environment('production')) {
            // verify our inbound hash
            if (!self::verifyHash($userSignature->event_type, $userSignature->event_time, $userSignature->event_hash)) {
                Log::error('HELLO SIGN ERROR: Inbound event hash not valid.');
                abort(404);
            }
        } else {
            // write payload to log for debugging
            Log::info('HELLO SIGN DEBUG: Full callback payload below.');
            Log::info($jsonRaw);
        }

        // hash is verified, lets save the signature record
        if (!$userSignature->save()) {
            Log::error("HELLO SIGN ERROR: Could not save user signature for user signature {$userSignature->signature_id}.");
            abort(404);
        }

        // all done
        return response()->json(['status' => config('hellosign.messages.callback', null)]);

    }

    private static function verifyHash($eventTime = null, $eventType = null, $inboundHash = null) {
        if (!isset($eventTime, $eventType, $inboundHash)) {
            return false;
        }
        $newHash = hash_hmac("sha256", $eventTime.$eventType, config('hellosign.keys.api_key', null));
        return ($inboundHash == $newHash);
    }
}
