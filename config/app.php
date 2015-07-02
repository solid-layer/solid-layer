<?php

return [

    /*
    * --------------------------------------------------------
    * Mailer Settings
    * ---------------------------------------------------------
    */
    'mailer' => [
        'adapter'  => getenv('MAILER_ADAPTER'),
        'host'     => getenv('MAILER_HOST'),
        'port'     => getenv('MAILER_PORT'),
        'username' => getenv('MAILER_USERNAME'),
        'password' => getenv('MAILER_PASSWORD'),
    ],

    /*
    * --------------------------------------------------------
    * Authentication settings
    * ---------------------------------------------------------
    * So, we want to use slayer's model to process auto auth
    */
    'auth' => [
        'model'          => 'App\Models\User',
        'password_field' => 'password',
        'auth_redirect'  => '/newsfeed',
    ],
];