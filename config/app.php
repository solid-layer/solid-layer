<?php

return [

    # ------------------------------------------------------------
    # Application Cache
    # ------------------------------------------------------------
    # ---- We need to cache our views and config for 
    # efficiency, this will never affect user's cache
    'cache' => true,



    # ------------------------------------------------------------
    # Application Debugging
    # ------------------------------------------------------------
    # ---- To easily track your bugs using pretty errors (whoops)
    'debug' => false,



    # ------------------------------------------------------------
    # Language Settings
    # ------------------------------------------------------------
    # ---- The place where you should supposed to assign which 
    # language folder will be used.
    'lang' => 'en',



    # ------------------------------------------------------------
    # SSL Support
    # ------------------------------------------------------------
    # ---- Mark true if your domain supports ssl, and to force 
    # re-write every url to ssl
    'ssl' => false,



    # ------------------------------------------------------------
    # Base URI
    # ------------------------------------------------------------
    # ---- Define your own base uri, using console the default
    # will be below
    'base_uri' => 'localhost',



    # ------------------------------------------------------------
    # Mailer Settings
    # ------------------------------------------------------------
    # ---- To be able to send an email, provide your email setting
    # mailer adapter should be
    'mailer' => [
        'adapter'    => env('MAILER_ADAPTER', 'swift'),
        'host'       => env('MAILER_HOST'),
        'port'       => env('MAILER_PORT'),
        'username'   => env('MAILER_USERNAME'),
        'password'   => env('MAILER_PASSWORD'),
        'encryption' => env('MAILER_ENCRYPTION'),
        'from'       => env('MAILER_MAIL_FROM'),

        'classes' => [
            'swift'   => 
                Bootstrap\Support\Mail\SwiftMailerAdapter::class,
            'mailgun' => 
                Bootstrap\Support\Mail\MailgunAdapter::class,
        ]
    ],



    # ------------------------------------------------------------
    # Authentication Settings
    # ------------------------------------------------------------
    # ---- So, we want to use slayer's model to process auto auth
    'auth' => [

        # - pass in your user model
        'model'          => 'App\Models\User',

        # - on what field will be used for the password
        'password_field' => 'password',

        # - When calling $this->auth->redirectIntended()
        'auth_redirect'  => '/newsfeed',
    ],



    # ------------------------------------------------------------
    # Service Providers
    # ------------------------------------------------------------
    'services' => [
        App\Providers\Slayer\URL::class,
        App\Providers\Slayer\Console::class,
        App\Providers\Slayer\Aliaser::class,
        App\Providers\Slayer\Log::class,
        App\Providers\Slayer\Cache::class,
        App\Providers\Slayer\Lang::class,
        App\Providers\Slayer\Mail::class,
        App\Providers\Slayer\Flash::class,
        App\Providers\Slayer\FlashBag::class,
        App\Providers\Slayer\Redirect::class,
        App\Providers\Slayer\Auth::class,
        App\Providers\Slayer\DB::class,
        App\Providers\Slayer\MetadataAdapter::class,
        App\Providers\Slayer\Session::class,
        App\Providers\Slayer\Router::class,
        App\Providers\Slayer\Response::class,
        App\Providers\Slayer\Request::class,
        App\Providers\Slayer\Filter::class,
        App\Providers\Slayer\ACL::class,
        App\Providers\Slayer\View::class,
        App\Providers\Slayer\Dispatcher::class,

        # - Register your own provider below.
        Sandbox\MySandBoxServiceProvider::class,
        App\Providers\AwsServiceProvider::class,
    ],

    'aliases' => [
        'ACL'          => Bootstrap\Facades\ACL::class,
        'Auth'         => Bootstrap\Facades\Auth::class,
        'Filter'       => Bootstrap\Facades\Filter::class,
        'Flash'        => Bootstrap\Facades\Flash::class,
        'FlashBag'     => Bootstrap\Facades\FlashBag::class,
        'Lang'         => Bootstrap\Facades\Lang::class,
        'Mail'         => Bootstrap\Facades\Mail::class,
        'Redirect'     => Bootstrap\Facades\Redirect::class,
        'Request'      => Bootstrap\Facades\Request::class,
        'Route'        => Bootstrap\Facades\Route::class,
        'Security'     => Bootstrap\Facades\Security::class,
        'Session'      => Bootstrap\Facades\Session::class,
        'Tag'          => Bootstrap\Facades\Tag::class,
        'URL'          => Bootstrap\Facades\URL::class,
        'View'         => Bootstrap\Facades\View::class,
        'AWS'          => App\Facade\AwsFacade::class,
    ],

]; # - end of return