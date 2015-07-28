<?php

use Bootstrap\Debugger;
// use Phalcon\Di\FactoryDefault;
// use Phalcon\Mvc\Application;
use Bootstrap\App;

define('SLAYER_START', microtime(true));
define('APP_ROOT', dirname(__DIR__));

try {

    # -------------------------------------------------------------
    # Composer Loader
    # -------------------------------------------------------------
    # ---- now call the composer autoload, this will require all
    # our application dependecies

    require_once APP_ROOT . '/vendor/autoload.php';

    $app = new App;
    $app->run();

} catch (Exception $e) {
    throw $e;
}