<?php

if (! defined('APP_ROOT')) {
    define('APP_ROOT', dirname(dirname(__DIR__)));

    require APP_ROOT . '/bootstrap/phalcon/helpers.php';
    require APP_ROOT . '/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(APP_ROOT);
    $dotenv->load();
}

$__config = new \Phalcon\Config(require_once APP_ROOT . '/config/.init.php');

return $__config;