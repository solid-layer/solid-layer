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
    # - Define your database adapter base it on database.php
    # the default adapter is mysql

    'db_adapter' => env('DB_ADAPTER', 'mysql'),


    # ----------------------------------------------------------------
    # Flysystem
    # ----------------------------------------------------------------
    # - Define your default flysystem

    'flysystem' => 'local',


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
                Bootstrap\Adapters\Mail\SwiftMailerAdapter::class,
            'mailgun' =>
                Bootstrap\Adapters\Mail\MailgunAdapter::class,
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
        Bootstrap\Providers\Console::class,
        Bootstrap\Providers\ACL::class,
        Bootstrap\Providers\Aliaser::class,
        Bootstrap\Providers\Auth::class,
        Bootstrap\Providers\Cache::class,
        Bootstrap\Providers\DB::class,
        Bootstrap\Providers\Dispatcher::class,
        Bootstrap\Providers\Filter::class,
        Bootstrap\Providers\Flash::class,
        Bootstrap\Providers\FlashBag::class,
        Bootstrap\Providers\Lang::class,
        Bootstrap\Providers\Log::class,
        Bootstrap\Providers\Mail::class,
        Bootstrap\Providers\MetadataAdapter::class,
        Bootstrap\Providers\Mongo::class,
        Bootstrap\Providers\Redirect::class,
        Bootstrap\Providers\Request::class,
        Bootstrap\Providers\Response::class,
        Bootstrap\Providers\Router::class,
        Bootstrap\Providers\Session::class,
        Bootstrap\Providers\URL::class,
        Bootstrap\Providers\View::class,
        Bootstrap\Providers\Flysystem::class,


        # - register your classes below.

        Acme\Acme\AcmeServiceProvider::class,
    ],


    'aliases'  => [
        'ACL'         => Bootstrap\Facades\ACL::class,
        'Auth'        => Bootstrap\Facades\Auth::class,
        'Config'      => Bootstrap\Facades\Config::class,
        'DB'          => Bootstrap\Facades\DB::class,
        'Filter'      => Bootstrap\Facades\Filter::class,
        'Flash'       => Bootstrap\Facades\Flash::class,
        'FlashBag'    => Bootstrap\Facades\FlashBag::class,
        'Lang'        => Bootstrap\Facades\Lang::class,
        'Log'         => Bootstrap\Facades\Log::class,
        'Mail'        => Bootstrap\Facades\Mail::class,
        'Redirect'    => Bootstrap\Facades\Redirect::class,
        'Request'     => Bootstrap\Facades\Request::class,
        'Response'    => Bootstrap\Facades\Response::class,
        'Route'       => Bootstrap\Facades\Route::class,
        'Security'    => Bootstrap\Facades\Security::class,
        'Session'     => Bootstrap\Facades\Session::class,
        'Tag'         => Bootstrap\Facades\Tag::class,
        'URL'         => Bootstrap\Facades\URL::class,
        'View'        => Bootstrap\Facades\View::class,
        'File'        => Bootstrap\Facades\Flysystem::class,
        'FileManager' => Bootstrap\Facades\FlysystemManager::class,


        # register class aliases below.

    ],

]; # - end of return
