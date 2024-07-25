<?php
return [
    'origin' => env('RECAPTCHAV3_ORIGIN', 'https://www.google.com/recaptcha'),
    'sitekey' => env('GOOGLE_RECAPTCHA_SITE_KEY', ''),
    'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY', ''),
    'locale' => env('RECAPTCHAV3_LOCALE', 'en')
];
