<?php

return [


    # ----------------------------------------------------------------
    # Application Debugging
    # ----------------------------------------------------------------
    # - To easily track your bugs, by defining it to true, you
    # can get a full error response

    'debug'    => false,


    # ----------------------------------------------------------------
    # Language Settings
    # ----------------------------------------------------------------
    # - The place where you should supposed to assign which
    # language folder will be used.

    'lang'     => 'en',


    # ----------------------------------------------------------------
    # Default Timezone
    # ----------------------------------------------------------------
    # - The system time to be, useful for CRUD records that will
    # based on the timezone

    'timezone'     => 'UTC',


    # ----------------------------------------------------------------
    # SSL Support
    # ----------------------------------------------------------------
    # - Mark true if your domain supports ssl, and to force
    # re-write every url to ssl

    'ssl'      => false,


    # ----------------------------------------------------------------
    # Base URI
    # ----------------------------------------------------------------
    # - Define your own base uri

    'base_uri' => 'localhost',


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

    'mailer'   => [
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
        'model'          => Components\Models\User::class,
        'password_field' => 'password',
        'auth_redirect'  => '/newsfeed',
    ],


    # ----------------------------------------------------------------
    # Service Providers
    # ----------------------------------------------------------------

    'services' => [
        Components\Providers\Slayer\ACL::class,
        Components\Providers\Slayer\Aliaser::class,
        Components\Providers\Slayer\Auth::class,
        Components\Providers\Slayer\Cache::class,
        Components\Providers\Slayer\Console::class,
        Components\Providers\Slayer\DB::class,
        Components\Providers\Slayer\Dispatcher::class,
        Components\Providers\Slayer\Filter::class,
        Components\Providers\Slayer\Flash::class,
        Components\Providers\Slayer\FlashBag::class,
        Components\Providers\Slayer\Lang::class,
        Components\Providers\Slayer\Log::class,
        Components\Providers\Slayer\Mail::class,
        Components\Providers\Slayer\MetadataAdapter::class,
        Components\Providers\Slayer\Mongo::class,
        Components\Providers\Slayer\Redirect::class,
        Components\Providers\Slayer\Request::class,
        Components\Providers\Slayer\Response::class,
        Components\Providers\Slayer\Router::class,
        Components\Providers\Slayer\Session::class,
        Components\Providers\Slayer\URL::class,
        Components\Providers\Slayer\View::class,


        # - register your classes below.

        Acme\Acme\AcmeServiceProvider::class,
        Components\Providers\FlysystemServiceProvider::class,
    ],


    'aliases'  => [
        'ACL'      => Components\Facades\Slayer\ACL::class,
        'Auth'     => Components\Facades\Slayer\Auth::class,
        'Config'   => Components\Facades\Slayer\Config::class,
        'DB'       => Components\Facades\Slayer\DB::class,
        'Filter'   => Components\Facades\Slayer\Filter::class,
        'Flash'    => Components\Facades\Slayer\Flash::class,
        'FlashBag' => Components\Facades\Slayer\FlashBag::class,
        'Lang'     => Components\Facades\Slayer\Lang::class,
        'Log'      => Components\Facades\Slayer\Log::class,
        'Mail'     => Components\Facades\Slayer\Mail::class,
        'Redirect' => Components\Facades\Slayer\Redirect::class,
        'Request'  => Components\Facades\Slayer\Request::class,
        'Response' => Components\Facades\Slayer\Response::class,
        'Route'    => Components\Facades\Slayer\Route::class,
        'Security' => Components\Facades\Slayer\Security::class,
        'Session'  => Components\Facades\Slayer\Session::class,
        'Tag'      => Components\Facades\Slayer\Tag::class,
        'URL'      => Components\Facades\Slayer\URL::class,
        'View'     => Components\Facades\Slayer\View::class,


        # register class aliases below.

        'File'      => Components\Facades\FileFacade::class,
        'Flysystem' => Components\Facades\FlysystemFacade::class,
    ],

]; # - end of return