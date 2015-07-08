<?php

if (! defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__));

    $di = new Phalcon\Di\FactoryDefault();
    $GLOBALS['__app'] = new \Phalcon\Mvc\Application($di);
}

/*
|-------------------------------------------------------------
| Load the helper functions
|-------------------------------------------------------------
*/
require_once APP_ROOT . '/bootstrap/src/helpers.php';


/*
|-------------------------------------------------------------
| Call Composer Autoload
|-------------------------------------------------------------
| We must load the composer for dependencies, 
| pre-instantiated the DotEnv package to support .env files
*/
require_once APP_ROOT . '/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(APP_ROOT);
$dotenv->load();


/*
|-------------------------------------------------------------
| Call Phalcon
|-------------------------------------------------------------
| This must be called, to re-initialize the process of DI
*/
$GLOBALS['__config'] = require_once APP_ROOT . '/bootstrap/src/config.php';

require_once APP_ROOT . '/bootstrap/src/loader.php';


/*
|-------------------------------------------------------------
| Now use the facade created by Taylor Otwell
|-------------------------------------------------------------
| We should inject the phalcon $GLOBALS['__app']
*/
Bootstrap\Facades\Facade::setFacadeApplication($GLOBALS['__app']);


/*
|-------------------------------------------------------------
| Get all the routes
|-------------------------------------------------------------
*/
require_once APP_ROOT . '/app/routes.php';


/*
|-------------------------------------------------------------
| Load all service providers
|-------------------------------------------------------------
*/
require_once APP_ROOT . '/bootstrap/src/services.php';


/*
|-------------------------------------------------------------
| Enabling Modular framework
|-------------------------------------------------------------
| We want to import some packages, to work with
| views, translations we must create a module for them.
*/
$GLOBALS['__app']->registerModules(config()->modules->toArray());