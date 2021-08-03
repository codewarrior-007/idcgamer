<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OnboardingMail;

class EmailTestController extends Controller
{
    public function onboarding()
    {
        $email = (new OnboardingMail('Ricky Bobby', '12345'))->render();

        $email = html_entity_decode($email);
        $email = str_replace('%7C', '|', $email);
        $email = str_replace('%7D', '}', $email);
        $email = str_replace('%7B', '{', $email);

        // \Mail::to('geoffrey.rose09@gmail.com')->send(new OnboardingMail());

        return $email;
    }
}
