<?php

return [


    # ----------------------------------------------------------------
    # Application Debugging
    # ----------------------------------------------------------------
    # - To easily track your bugs, by defining it to true, you
    # can get a full error response

    'debug' => false,


    # ----------------------------------------------------------------
    # Language Settings
    # ----------------------------------------------------------------
    # - The place where you should supposed to assign which
    # language folder will be used.

    'lang' => 'en',


    # ----------------------------------------------------------------
    # Default Timezone
    # ----------------------------------------------------------------
    # - The system time to be, useful for CRUD records that will
    # based on the timezone

    'timezone' => 'UTC',


    # ----------------------------------------------------------------
    # SSL Support
    # ----------------------------------------------------------------
    # - Mark true if your domain supports ssl, and to force
    # re-write every url to ssl

    'ssl' => false,


    # ----------------------------------------------------------------
    # Base URI
    # ----------------------------------------------------------------
    # - Define your own base uri

    'base_uri' => 'localhost',


    # ----------------------------------------------------------------
    # Session Name
    # ----------------------------------------------------------------
    # - This will be the name of your session located in the browsers
    # rename it into your own
    #
    # - Provide an alphanumeric character without any special
    # character

    'session' => 'slayer',


    # ----------------------------------------------------------------
    # Default Database Adapter
    # ----------------------------------------------------------------
    # - Define your database adapter base it on database.php,
    # the default adapter is mysql

    'db_adapter' => env('DB_ADAPTER', 'mysql'),


    # ----------------------------------------------------------------
    # Default Cache Adapter
    # ----------------------------------------------------------------
    # - Define your cache adapter base it on cache.php,
    # the default adapter is file

    'cache_adapter' => env('CACHE_ADAPTER', 'file'),


    # ----------------------------------------------------------------
    # Flysystem
    # ----------------------------------------------------------------
    # - Define your default flysystem

    'flysystem' => 'local',


    # ----------------------------------------------------------------
    # Default Error Handler
    # ----------------------------------------------------------------
    # - The error handler class that we will be using

    'error_handler' => Components\Exceptions\Handler::class,


    # ----------------------------------------------------------------
    # Mailer Settings
    # ----------------------------------------------------------------
    # - To be able to send an email, provide your email
    # settings, such as adapters and the like

    'mailer' => [
        'adapter'    => env('MAILER_ADAPTER', 'swift'),
        'host'       => env('MAILER_HOST'),
        'port'       => env('MAILER_PORT'),
        'username'   => env('MAILER_USERNAME'),
        'password'   => env('MAILER_PASSWORD'),
        'encryption' => env('MAILER_ENCRYPTION'),
        'from'       => env('MAILER_MAIL_FROM'),

        'classes'    => [
            'swift'   =>
                Clarity\Adapters\Mail\SwiftMailerAdapter::class,
            'mailgun' =>
                Clarity\Adapters\Mail\MailgunAdapter::class,
        ],
    ],


    # ----------------------------------------------------------------
    # Authentication Settings
    # ----------------------------------------------------------------

    'auth'     => [
        'model'          => Components\Model\User::class,
        'password_field' => 'password',
        'redirect_key'   => 'ref',
    ],


    # ----------------------------------------------------------------
    # Service Providers
    # ----------------------------------------------------------------

    'services' => [
        Clarity\Providers\Console::class,
        Clarity\Providers\ACL::class,
        Clarity\Providers\Aliaser::class,
        Clarity\Providers\Auth::class,
        Clarity\Providers\Cache::class,
        Clarity\Providers\DB::class,
        Clarity\Providers\Dispatcher::class,
        Clarity\Providers\Filter::class,
        Clarity\Providers\Flash::class,
        Clarity\Providers\FlashBag::class,
        Clarity\Providers\Lang::class,
        Clarity\Providers\Log::class,
        Clarity\Providers\Mail::class,
        Clarity\Providers\MetadataAdapter::class,
        Clarity\Providers\Mongo::class,
        Clarity\Providers\Redirect::class,
        Clarity\Providers\Request::class,
        Clarity\Providers\Response::class,
        Clarity\Providers\Router::class,
        Clarity\Providers\Session::class,
        Clarity\Providers\URL::class,
        Clarity\Providers\View::class,
        Clarity\Providers\Flysystem::class,


        # - register your classes below.

        Acme\Acme\AcmeServiceProvider::class,
    ],


    'aliases'  => [
        'ACL'         => Clarity\Facades\ACL::class,
        'Auth'        => Clarity\Facades\Auth::class,
        'Cache'       => Clarity\Facades\Cache::class,
        'Config'      => Clarity\Facades\Config::class,
        'DB'          => Clarity\Facades\DB::class,
        'Filter'      => Clarity\Facades\Filter::class,
        'Flash'       => Clarity\Facades\Flash::class,
        'FlashBag'    => Clarity\Facades\FlashBag::class,
        'Lang'        => Clarity\Facades\Lang::class,
        'Log'         => Clarity\Facades\Log::class,
        'Mail'        => Clarity\Facades\Mail::class,
        'Redirect'    => Clarity\Facades\Redirect::class,
        'Request'     => Clarity\Facades\Request::class,
        'Response'    => Clarity\Facades\Response::class,
        'Route'       => Clarity\Facades\Route::class,
        'Security'    => Clarity\Facades\Security::class,
        'Session'     => Clarity\Facades\Session::class,
        'Tag'         => Clarity\Facades\Tag::class,
        'URL'         => Clarity\Facades\URL::class,
        'View'        => Clarity\Facades\View::class,
        'File'        => Clarity\Facades\Flysystem::class,
        'FileManager' => Clarity\Facades\FlysystemManager::class,


        # register class aliases below.

    ],

]; # - end of return
