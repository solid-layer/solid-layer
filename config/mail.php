<?php

return [

    'swift' => [
        'active'  => env('MAILER_ACTIVE', true),
        'class'   => Clarity\Mail\SwiftMailer\SwiftMailer::class,
        'options' => [
            'host'       => env('MAILER_HOST'),
            'port'       => env('MAILER_PORT'),
            'username'   => env('MAILER_USERNAME'),
            'password'   => env('MAILER_PASSWORD'),
            'encryption' => env('MAILER_ENCRYPTION', 'tls'),
            'from'       => env('MAILER_MAIL_FROM'),
        ],
    ],

    'mailgun' => [
        'active'  => env('MAILER_ACTIVE', true),
        'class'   => Clarity\Mail\Mailgun\Mailgun::class,
        'options' => [
            'from' => env('MAILER_MAIL_FROM'),
        ],
    ],

];
