<?php

return [

    'swift' => [
        'host'       => env('MAILER_HOST'),
        'port'       => env('MAILER_PORT'),
        'username'   => env('MAILER_USERNAME'),
        'password'   => env('MAILER_PASSWORD'),
        'encryption' => env('MAILER_ENCRYPTION', 'tls'),
        'from'       => env('MAILER_MAIL_FROM'),
        'class'      => Clarity\Mail\SwiftMailer\SwiftMailer::class,
    ],

    'mailgun' => [
        'from'       => env('MAILER_MAIL_FROM'),
        'class'      => Clarity\Mail\Mailgun\Mailgun::class,
    ],

];
