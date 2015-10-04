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
        Components\Providers\Slayer\URL::class,
        Components\Providers\Slayer\Console::class,
        Components\Providers\Slayer\Aliaser::class,
        Components\Providers\Slayer\Log::class,
        Components\Providers\Slayer\Cache::class,
        Components\Providers\Slayer\Lang::class,
        Components\Providers\Slayer\Mail::class,
        Components\Providers\Slayer\Flash::class,
        Components\Providers\Slayer\FlashBag::class,
        Components\Providers\Slayer\Redirect::class,
        Components\Providers\Slayer\Auth::class,
        Components\Providers\Slayer\DB::class,
        Components\Providers\Slayer\MetadataAdapter::class,
        Components\Providers\Slayer\Session::class,
        Components\Providers\Slayer\Router::class,
        Components\Providers\Slayer\Response::class,
        Components\Providers\Slayer\Request::class,
        Components\Providers\Slayer\Filter::class,
        Components\Providers\Slayer\ACL::class,
        Components\Providers\Slayer\View::class,
        Components\Providers\Slayer\Dispatcher::class,
        Components\Providers\Slayer\Mongo::class,


        # - register your classes below.

        Acme\Acme\AcmeServiceProvider::class,
        Components\Providers\FlysystemServiceProvider::class,
    ],


    'aliases'  => [
        'ACL'      => Bootstrap\Facades\ACL::class,
        'Auth'     => Bootstrap\Facades\Auth::class,
        'Config'   => Bootstrap\Facades\Config::class,
        'Filter'   => Bootstrap\Facades\Filter::class,
        'Flash'    => Bootstrap\Facades\Flash::class,
        'FlashBag' => Bootstrap\Facades\FlashBag::class,
        'Lang'     => Bootstrap\Facades\Lang::class,
        'Mail'     => Bootstrap\Facades\Mail::class,
        'Redirect' => Bootstrap\Facades\Redirect::class,
        'Response' => Bootstrap\Facades\Response::class,
        'Request'  => Bootstrap\Facades\Request::class,
        'Route'    => Bootstrap\Facades\Route::class,
        'Security' => Bootstrap\Facades\Security::class,
        'Session'  => Bootstrap\Facades\Session::class,
        'Tag'      => Bootstrap\Facades\Tag::class,
        'URL'      => Bootstrap\Facades\URL::class,
        'View'     => Bootstrap\Facades\View::class,
        'Log'      => Bootstrap\Facades\Log::class,


        # register class aliases below.

        'File'      => Components\Facade\FileFacade::class,
        'Flysystem' => Components\Facade\FlysystemFacade::class,
    ],

]; # - end of return