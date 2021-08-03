@component('mail::message',
    [
        'header_url' => 'https://symmetryonboarding.com/',
        'header_image' => asset('img/emails/onboarding_notification.png')
    ])

Hi {{ $name }}!

We're excited that you're interested in joining us at Symmetry Financial Group! Use the link below to activate your account and complete your application.

***Please note the following before registering:**

1. This site is designed for Desktop/Mac computers and laptops.
2. Tablets and Smartphones won't work for this application.
3. Please use Google Chrome as your browser as other browsers like Edge, Safari, Firefox, etc. will have issues.
4. Whenever you come across a signature page, please attempt to sign your full name. If you put your initials only, your onboarding process will be delayed.

Step 1: Copy this Invitation Code: <strong>{{ $code }}</strong><br>
Step 2: Click this Registration Link: <a href="{{ config('app.url') }}?code={{ $code }}">Click here to get started</a>!<br>
Step 3: Enter your Invitation Code when prompted.

Thanks,<br>
Logan Long<br>
<a href="mailto:llong@sfglife.com">llong@sfglife.com</a><br>
Sent via Symmetry Onboarding Portal

@endcomponent
