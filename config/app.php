<?php

return [


    /*
    +----------------------------------------------------------------+
    |\ Application Debugging                                        /|
    +----------------------------------------------------------------+
    |
    | To easily track your bugs, by defining it to true, you
    | can get a full error response
    |
    */

    'debug' => false,


    /*
    +----------------------------------------------------------------+
    |\ Language Settings                                            /|
    +----------------------------------------------------------------+
    |
    | The place where you should supposed to assign which
    | language folder will be used.
    |
    */

    'lang' => 'en',


    /*
    +----------------------------------------------------------------+
    |\ Default Timezone                                             /|
    +----------------------------------------------------------------+
    |
    | The system time to be, useful for CRUD records that will be
    | based on the timezone for created, updated, and deleted
    | timestamps
    |
    */

    'timezone' => 'UTC',


    /*
    +----------------------------------------------------------------+
    |\ SSL Support                                                  /|
    +----------------------------------------------------------------+
    |
    | Mark true if your domain supports ssl, and to force
    | re-write every url to ssl
    |
    */

    'ssl' => [
        'main' => false,
    ],


    /*
    +----------------------------------------------------------------+
    |\ Base URI                                                     /|
    +----------------------------------------------------------------+
    |
    | We are defining our base uri, while some of our components
    | can catch the server defined url, this thing helps our command
    | line interface (cli)
    |
    */

    'base_uri' => [
        'main' => 'localhost',
    ],


    /*
    +----------------------------------------------------------------+
    |\ Session Name                                                 /|
    +----------------------------------------------------------------+
    |
    | It will be the name of your session located in the browsers'
    | cache, rename it to change your session name
    |
    | Note: Provide an alphanumeric character without any special
    | character
    |
    */

    'session' => 'slayer',


    /*
    +----------------------------------------------------------------+
    |\ Database Adapter                                             /|
    +----------------------------------------------------------------+
    |
    | Define your database adapter, base it on database.php config
    | file
    |
    */

    'db_adapter' => env('DB_ADAPTER'),


    /*
    +----------------------------------------------------------------+
    |\ NoSQL Adapter                                                /|
    +----------------------------------------------------------------+
    |
    | Define your nosql adapter, base it on database.php config
    | file, the default adapter is "mongo1"
    |
    */

    'nosql_adapter' => 'mongo1',


    /*
    +----------------------------------------------------------------+
    |\ Cache Adapter                                                /|
    +----------------------------------------------------------------+
    |
    | Define your cache adapter, base it on cache.php config file,
    | the default adapter is "file"
    |
    */

    'cache_adapter' => env('CACHE_ADAPTER', 'file'),


    /*
    +----------------------------------------------------------------+
    |\ Queue Adapter                                                /|
    +----------------------------------------------------------------+
    |
    | Define your queue adapter, base it on queue.php config file,
    | the default adapter is "beanstalk"
    |
    */

    'queue_adapter' => env('QUEUE_ADAPTER', 'beanstalk'),


    /*
    +----------------------------------------------------------------+
    |\ Session Adapter                                              /|
    +----------------------------------------------------------------+
    |
    | Define your session adapter, base it on session.php config file,
    | the default adapter is "file"
    |
    */

    'session_adapter' => env('SESSION_ADAPTER', 'file'),


    /*
    +----------------------------------------------------------------+
    | Flysystem                                                     /|
    +----------------------------------------------------------------+
    |
    | Define your default flysystem
    |
    */

    'flysystem' => 'local',


    /*
    +----------------------------------------------------------------+
    |\ Error Handler                                                /|
    +----------------------------------------------------------------+
    |
    | An error handler that dispatches all errors for specific
    | instance
    |
    */

    'error_handler' => Components\Exceptions\Handler::class,


    /*
    +----------------------------------------------------------------+
    |\ Mailer Settings                                              /|
    +----------------------------------------------------------------+
    |
    | To be able to send an email, provide your email
    | settings, such as adapters and the like
    |
    */

    'mail_adapter' => env('MAIL_ADAPTER', 'swift'),


    /*
    +----------------------------------------------------------------+
    |\ Logging Time                                                 /|
    +----------------------------------------------------------------+
    |
    | Try to choose "monthly", "daily", "hourly" to log separate files
    | else provide a boolean false to disable
    |
    */

    'logging_time' => 'hourly',


    /*
    +----------------------------------------------------------------+
    |\ Authentication Settings                                      /|
    +----------------------------------------------------------------+
    |
    | This auth settings will help you to easily authenticate your
    | users from your form inputs.
    |
    | Reference:
    |    AuthController->attemptToLoginAction()
    |
    */

    'auth'     => [
        'model'          => Components\Model\User::class,
        'password_field' => 'password',
        'redirect_key'   => 'ref',
    ],


    /*
    +----------------------------------------------------------------+
    |\ Service Providers                                            /|
    +----------------------------------------------------------------+
    |
    | A service provider will be stored as a dependency injection (di)
    | and available to call using the di() function
    |
    | e.g:
    |     di()->get('router')->get(..., [...]);
    |
    | or you can use the Facade Class
    |      Clarity\Facades\Route::get(..., [...]);
    */

    'services' => [
        Clarity\Providers\Log::class,
        Clarity\Providers\ErrorHandler::class,
        Clarity\Providers\Console::class,
        Clarity\Providers\Aliaser::class,
        Clarity\Providers\Auth::class,
        Clarity\Providers\Cache::class,
        Clarity\Providers\DB::class,
        Clarity\Providers\Dispatcher::class,
        Clarity\Providers\Filter::class,
        Clarity\Providers\Flash::class,
        Clarity\Providers\FlashBag::class,
        Clarity\Providers\Lang::class,
        Clarity\Providers\Mail::class,
        Clarity\Providers\MetadataAdapter::class,
        Clarity\Providers\Mongo::class,
        Clarity\Providers\Redirect::class,
        Clarity\Providers\Request::class,
        Clarity\Providers\Response::class,
        Clarity\Providers\Router::class,
        Clarity\Providers\Session::class,
        Clarity\Providers\Queue::class,
        Clarity\Providers\URL::class,
        Clarity\View\ViewServiceProvider::class,
        Clarity\Providers\Flysystem::class,
        Clarity\Providers\CollectionManager::class,


        # - register your classes below.

        Acme\Acme\AcmeServiceProvider::class,
    ],


    /*
    +----------------------------------------------------------------+
    |\ Class Aliases                                                /|
    +----------------------------------------------------------------+
    |
    | Instead of using a full class namespace, you could defined
    | below an alias of your class.
    |
    */

    'aliases'  => [
        'Auth'        => Clarity\Facades\Auth::class,
        'Cache'       => Clarity\Facades\Cache::class,
        'Config'      => Clarity\Facades\Config::class,
        'DB'          => Clarity\Facades\DB::class,
        'File'        => Clarity\Facades\Flysystem::class,
        'FileManager' => Clarity\Facades\FlysystemManager::class,
        'Filter'      => Clarity\Facades\Filter::class,
        'Flash'       => Clarity\Facades\Flash::class,
        'FlashBag'    => Clarity\Facades\FlashBag::class,
        'Lang'        => Clarity\Facades\Lang::class,
        'Log'         => Clarity\Facades\Log::class,
        'Mail'        => Clarity\Facades\Mail::class,
        'Queue'       => Clarity\Facades\Queue::class,
        'Redirect'    => Clarity\Facades\Redirect::class,
        'Request'     => Clarity\Facades\Request::class,
        'Response'    => Clarity\Facades\Response::class,
        'Route'       => Clarity\Facades\Route::class,
        'Security'    => Clarity\Facades\Security::class,
        'Session'     => Clarity\Facades\Session::class,
        'Tag'         => Clarity\Facades\Tag::class,
        'URL'         => Clarity\Facades\URL::class,
        'View'        => Clarity\Facades\View::class,


        # register class aliases below.

    ],

]; # - end of return
