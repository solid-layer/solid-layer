<?php

if (! defined('APP_ROOT')) {
  define('APP_ROOT', dirname(__DIR__));
}

/*
|-------------------------------------------------------------
| Load the helper functions
|-------------------------------------------------------------
*/
require_once APP_ROOT . '/bootstrap/phalcon/helpers.php';


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
$config = 
  require_once APP_ROOT . '/bootstrap/phalcon/config.php';
require_once APP_ROOT . '/bootstrap/phalcon/loader.php';
require_once APP_ROOT . '/bootstrap/phalcon/services.php';

