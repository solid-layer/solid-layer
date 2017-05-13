<?php

return [

    'smtp' => [
        'class'   => Clarity\Mail\SwiftMailer\SmtpMailer::class,
        'options' => [
            'host'       => env('MAILER_HOST'),
            'port'       => env('MAILER_PORT'),
            'username'   => env('MAILER_USERNAME'),
            'password'   => env('MAILER_PASSWORD'),
            'encryption' => env('MAILER_ENCRYPTION', 'tls'),
            'from'       => env('MAILER_MAIL_FROM'),
        ],
    ],

    'sendmail' => [
        'class'   => Clarity\Mail\SwiftMailer\SendmailMailer::class,
        'options' => [
            'from' => env('MAILER_MAIL_FROM'),
        ],
    ],

    'mail' => [
        'class'   => Clarity\Mail\SwiftMailer\MailMailer::class,
        'options' => [
            'from' => env('MAILER_MAIL_FROM'),
        ],
    ],

    'mailgun' => [
        'class'   => Clarity\Mail\Mailgun\Mailgun::class,
        'options' => [
            'from' => env('MAILER_MAIL_FROM'),
        ],
    ],

];
