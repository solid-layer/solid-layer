<?php

define('SLAYER_START', microtime(true));
define('BASE_PATH', dirname(__DIR__));

error_reporting(-1);

if ( !extension_loaded('phalcon') ) {
    echo 'Phalcon extension required.'.PHP_EOL;
    exit;
}


/*
+----------------------------------------------------------------+
|\ Dependencies                                                 /|
+----------------------------------------------------------------+
|
| call composer autoload to call all dependencies
|
*/

require BASE_PATH.'/vendor/autoload.php';


/*
+----------------------------------------------------------------+
|\ Compiled Classes                                             /|
+----------------------------------------------------------------+
|
| check if there is existing compiled class then require the file
|
*/

$compiled = BASE_PATH .'/storage/slayer/compiled.php';

if (file_exists($compiled) && php_sapi_name() != 'cli') {
    require $compiled;
}


/*
+----------------------------------------------------------------+
|\ Environmental Configuration                                  /|
+----------------------------------------------------------------+
|
| a better way to configure specific server configuration
| by creating  '.env' file in the root
|
*/

if (file_exists(BASE_PATH.'/.env')) {
    $dotenv = new Dotenv\Dotenv(
        dirname(url_trimmer(BASE_PATH.'/.env'))
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

$path = require url_trimmer(__DIR__.'/path.php');
$modules = require url_trimmer(BASE_PATH.'/app/modules.php');

$kernel
    ->setPath($path)
    ->setModules($modules)
    ->setEnvironment(env('APP_ENV'))
    ->initialize();


/*
+----------------------------------------------------------------+
|\ Removing action suffix                                       /|
+----------------------------------------------------------------+
|
| by default, phalcon has a suffix of <method>Action() on every
| controller to get rid with this, we must apply an empty on it
|
*/

di()->get('dispatcher')->setActionSuffix('');
