<?php

error_reporting(-1);

if ( ! extension_loaded('phalcon')) {
    echo 'Phalcon extension required.'.PHP_EOL;

    exit(1);
}

define('BASE_PATH', dirname(__DIR__));
define('SLAYER_START', microtime(true));

require __DIR__ . '/app.php';

$kernel = (new App(BASE_PATH))->bootstrap();
