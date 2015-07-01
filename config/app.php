<?php

return [

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