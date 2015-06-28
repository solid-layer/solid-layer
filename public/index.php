<?php

# Even whoops won't work
if (getenv('APP_DEBUG') == 'true') {
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
}
define('APP_ROOT', dirname(__DIR__));

try {
    
    $di = new Phalcon\Di\FactoryDefault();

    require_once APP_ROOT . '/vendor/autoload.php';

    /*
    |-------------------------------------------------------------
    | Whoops Debugger
    |-------------------------------------------------------------
    */
    if (getenv('APP_DEBUG') == 'true') {
        new Whoops\Provider\Phalcon\WhoopsServiceProvider($di);
    }


    /*
    |-------------------------------------------------------------
    | Instantiate Phalcon App
    |-------------------------------------------------------------
    | We must inject our dependencies inside the Phalcon
    | application layer, to make everything works.
    */
    $__app = new \Phalcon\Mvc\Application($di);


    /*
    |-------------------------------------------------------------
    | Bootstrapper
    |-------------------------------------------------------------
    */
    require_once APP_ROOT . '/bootstrap/autoload.php';


    /*
    |-------------------------------------------------------------
    | Now show the app content based on the uri requests
    |-------------------------------------------------------------
    */
    // $__app->useImplicitView(false);
    echo $__app->handle()->getContent();

} catch (\Exception $e) {
    throw $e;
}