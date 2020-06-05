<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '667546396035-372flap1bl13nlitm4bkbmibaln0emmo.apps.googleusercontent.com',
        'client_secret' => 'Xz12lprloCuSMcbuuHIXSJe8',
        'redirect' => 'http://localhost/Ecommerce_DP/callback/google',
    ],

    'facebook' => [
        'client_id' => '667546396035-372flap1bl13nlitm4bkbmibaln0emmo.apps.googleusercontent.com',
        'client_secret' => 'Xz12lprloCuSMcbuuHIXSJe8',
        'redirect' => 'http://localhost/Ecommerce_DP/callback/facebook',
    ],

];
