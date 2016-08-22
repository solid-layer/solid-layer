<?php

define('SLAYER_START', microtime(true));

error_reporting(-1);

if (! extension_loaded('phalcon')) {
    echo 'Phalcon extension required.'.PHP_EOL;
    exit;
}

$base_path = __DIR__.'/../';

/*
+----------------------------------------------------------------+
|\ Compiled Classes                                             /|
+----------------------------------------------------------------+
|
| check if there is existing compiled class then require the file
|
*/

$compiled = $base_path.'/storage/slayer/compiled.php';

if (file_exists($compiled)) {
    require $compiled;
}

/*
+----------------------------------------------------------------+
|\ Dependencies                                                 /|
+----------------------------------------------------------------+
|
| call composer autoload to call all dependencies
|
*/

require $base_path.'/vendor/autoload.php';

/*
+----------------------------------------------------------------+
|\ Environmental Configuration                                  /|
+----------------------------------------------------------------+
|
| a better way to configure specific server configuration
| by creating  '.env' file in the root
|
*/

if (file_exists($base_path.'/.env')) {
    $dotenv = new Dotenv\Dotenv(
        dirname(url_trimmer($base_path.'/.env'))
    );

    $dotenv->load();
}

/*
+----------------------------------------------------------------+
|\ System Start Up                                              /|
+----------------------------------------------------------------+
|
| instantiate the main kernel and set-up the configurations
| such as paths and modules
|
*/

$kernel = new Clarity\Kernel\Kernel;

$kernel
    ->setPath(require_once url_trimmer(__DIR__.'/path.php'))
    ->setEnvironment(env('APP_ENV', 'production'))
    ->loadFactory()
    ->loadConfig()
    ->loadTimeZone();

return $kernel;
