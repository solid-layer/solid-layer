<?php

if (! defined('APP_ROOT')) {
    define('APP_ROOT', dirname(dirname(__DIR__)));

    require APP_ROOT . '/bootstrap/phalcon/helpers.php';
    require APP_ROOT . '/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(APP_ROOT);
    $dotenv->load();
}

$__config = new \Phalcon\Config([
    # Phalcon Provided
    'database'        => require_once APP_ROOT . '/config/databases.php',
    'application'     => require_once APP_ROOT . '/config/paths.php',

    # Custom Commands
    'slayer_acl'      => require_once APP_ROOT . '/config/acl.php',
    'slayer_consoles' => require_once APP_ROOT . '/config/consoles.php',
    'slayer_services' => require_once APP_ROOT . '/config/services.php',
]);

return $__config;