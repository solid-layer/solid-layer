<?php

use Phalcon\Config;

if (! defined('APP_ROOT')) {
    define('APP_ROOT', dirname(dirname(__DIR__)));

    require APP_ROOT . '/bootstrap/phalcon/helpers.php';
    require APP_ROOT . '/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(APP_ROOT);
    $dotenv->load();
}


# if there is cached config
$cache_config_file = APP_ROOT . '/storage/cache/slayer_config.cache';
if (file_exists($cache_config_file)) {
    $cached_config = file_get_contents($cache_config_file);

    if ( strlen($cached_config) != 0 ) {
        return new Config(unserialize($cached_config));
    }
}


# if there is no cached config
$__config = new Config(require_once APP_ROOT . '/config/.init.php');

$env_file_init = APP_ROOT . '/config/' . env('APP_ENV') . '/.init.php';
if (file_exists($env_file_init)) {
    $env_config = new Config(require_once $env_file_init);

    $__config->merge($env_config);
}

return $__config;