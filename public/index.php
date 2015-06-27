<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

define('APP_ROOT', dirname(__DIR__));

try {

    /*
    |-------------------------------------------------------------
    | Bootstrapper
    |-------------------------------------------------------------
    */
    require_once APP_ROOT . '/bootstrap/start.php';


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
    | Now use the facade created by Taylor Otwell
    |-------------------------------------------------------------
    | We should inject the phalcon $__app so that facade class
    | will be able to get all injected shared dependencies.
    */
    Bootstrap\Facades\Facade::setFacadeApplication($__app);


    /*
    |-------------------------------------------------------------
    | Now include the routes
    |-------------------------------------------------------------
    */
    require_once APP_ROOT . '/app/routes.php';


    /*
    |-------------------------------------------------------------
    | Now show the app content based on the uri requests
    |-------------------------------------------------------------
    */
    echo $__app->handle()->getContent();


} catch (Exception $e) {
    echo $e->getMessage();
}
