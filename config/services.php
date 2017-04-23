<?php

return [

    'mailgun' => [
        'domain' => env('MAILER_MAILGUN_DOMAIN', ''),
        'secret' => env('MAILER_MAILGUN_SECRET', ''),
    ],

    'sendmail' => '/usr/sbin/sendmail -bs',

]; # end of return
