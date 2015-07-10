<?php

use Exception;
use Whoops\Provider\Phalcon\WhoopsServiceProvider;
use Phalcon\Mvc\Application;

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
        new WhoopsServiceProvider($di);
    }


    /*
    |-------------------------------------------------------------
    | Instantiate Phalcon App
    |-------------------------------------------------------------
    | We must inject our dependencies inside the Phalcon
    | application layer, to make everything works.
    */
    $app = new Application($di);


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
    echo $app->handle()->getContent();

} catch (Exception $e) {
    throw $e;
}