<?php

return [

    'swift' => [
        'host'       => env('MAILER_HOST'),
        'port'       => env('MAILER_PORT'),
        'username'   => env('MAILER_USERNAME'),
        'password'   => env('MAILER_PASSWORD'),
        'encryption' => env('MAILER_ENCRYPTION', 'tls'),
        'from'       => env('MAILER_MAIL_FROM'),
        'class'      => Clarity\Adapters\Mail\SwiftMailerAdapter::class,
    ],

    'mailgun' => [
        'host'       => env('MAILER_HOST'),
        'port'       => env('MAILER_PORT'),
        'username'   => env('MAILER_USERNAME'),
        'password'   => env('MAILER_PASSWORD'),
        'encryption' => env('MAILER_ENCRYPTION'),
        'from'       => env('MAILER_MAIL_FROM'),
        'class'      => Clarity\Adapters\Mail\MailgunAdapter::class,
    ],

];
