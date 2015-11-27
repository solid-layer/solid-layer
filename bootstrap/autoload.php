<?php

define('SLAYER_START', microtime(true));
define('BASE_PATH', dirname(__DIR__));

error_reporting(-1);

if ( !extension_loaded('phalcon') ) {
    echo 'Phalcon extension required.'.PHP_EOL;
    exit;
}


# - call composer autoload to load all the dependencies

require BASE_PATH . '/vendor/autoload.php';


# - check if there is existing compiled class
# then require the file.

$compiled = BASE_PATH .'/storage/slayer/compiled.php';
if ( file_exists($compiled) && php_sapi_name() != 'cli' ) {
    require $compiled;
}


# - instantiate the kernel class and start loading the configurations
# and the services.

require BASE_PATH . '/vendor/phalconslayer/framework/src/Kernel.php';

$kernel = (new \Clarity\Kernel(BASE_PATH))->bootstrap();
