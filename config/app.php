<?php

return [

    /*
    |--------------------------------------------------------
    | Application Cache
    |--------------------------------------------------------
    | We need to cache our views and config for 
    | efficiency, this will never affect user's cache
    */
    'cache' => true,

    /*
    |--------------------------------------------------------
    | Application Debugging
    |--------------------------------------------------------
    | To easily track your bugs using pretty errors (whoops)
    */
    'debug' => false,

    /*
    |--------------------------------------------------------
    | Language Settings
    |--------------------------------------------------------
    | The place where you should supposed to assign which 
    | language folder will be used.
    */
    'lang' => 'en',


    /*
    |--------------------------------------------------------
    | Mailer Settings
    |--------------------------------------------------------
    | To be able to send an email, provide your email setting
    | mailer adapter should be
    */
    'mailer' => [
        'adapter'    => env('MAILER_ADAPTER', 'swift'),
        'host'       => env('MAILER_HOST'),
        'port'       => env('MAILER_PORT'),
        'username'   => env('MAILER_USERNAME'),
        'password'   => env('MAILER_PASSWORD'),
        'encryption' => env('MAILER_ENCRYPTION'),
        'from'       => env('MAILER_MAIL_FROM'),

        'classes' => [
            'swift'   => Bootstrap\Support\Mail\SwiftMailerAdapter::class,
            'mailgun' => Bootstrap\Support\Mail\MailgunAdapter::class,
        ]
    ],


    /*
    |--------------------------------------------------------
    | Authentication Settings
    |---------------------------------------------------------
    | So, we want to use slayer's model to process auto auth
    */
    'auth' => [

        // pass in your user model
        'model'          => 'App\Models\User',

        // assigned field on what field will be used
        'password_field' => 'password',

        // When calling $this->auth->redirectIntended()
        'auth_redirect'  => '/newsfeed',
    ],


    /*
    |--------------------------------------------------------
    | Service Providers
    |---------------------------------------------------------
    | 
    */
    'services' => [
        App\Providers\Console::class,
        App\Providers\Log::class,
        App\Providers\Cache::class,
        App\Providers\Lang::class,
        App\Providers\Mail::class,
        App\Providers\Flash::class,
        App\Providers\FlashSession::class,
        App\Providers\Redirect::class,
        App\Providers\Auth::class,
        App\Providers\URL::class,
        App\Providers\DB::class,
        App\Providers\MetadataAdapter::class,
        App\Providers\Session::class,
        App\Providers\Router::class,
        App\Providers\Response::class,
        App\Providers\Request::class,
        App\Providers\Filter::class,
        App\Providers\ACL::class,
        App\Providers\View::class,
        App\Providers\Dispatcher::class,

        // Register your own provider here.
        Sandbox\MySandBoxServiceProvider::class,
    ],
];