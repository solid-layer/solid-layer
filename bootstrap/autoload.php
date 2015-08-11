<?php

if (!defined('APP_ROOT')) {
    define('APP_ROOT', dirname(__DIR__));

    $di = new \Phalcon\Di\FactoryDefault();
    $app = new \Phalcon\Mvc\Application($di);
}


# Load all the dependencies via composer
require_once APP_ROOT . '/vendor/autoload.php';


# Pre-Load the dotenv, to access all .env files
$dotenv = new Dotenv\Dotenv(APP_ROOT);
$dotenv->load();


# Injecting config
$main_config = APP_ROOT . '/config/.init.php';
$env_config_file = APP_ROOT . '/config/' . getenv('APP_ENV') . '/.init.php';

$di->set('config', function () use ($main_config, $env_config_file) {
    $config = new \Phalcon\Config(require_once $main_config);

    if (file_exists($env_config_file)) {
        $env_config = new \Phalcon\Config(require_once $env_config_file);

        $config->merge($env_config);
    }

    return $config;

}, true);


# Load the facade class
Bootstrap\Facades\Facade::setFacadeApplication($app);


# Get all the helpers
require_once APP_ROOT . '/bootstrap/src/helpers.php';


# Load all the services
require_once APP_ROOT . '/bootstrap/src/services.php';


# Get all the routes
require_once APP_ROOT . '/app/routes.php';


# Register all the modules
$app->registerModules(config()->modules->toArray());