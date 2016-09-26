<?php

$kernel = require_once __DIR__.'/autoload.php';

$handler = config()->app->error_handler;
(new $handler)->report();

/*
+----------------------------------------------------------------+
|\ Load Services                                                /|
+----------------------------------------------------------------+
|
| Load all the services registered at config()->app->services
|
*/

$kernel->loadServices();

/*
+----------------------------------------------------------------+
|\ Public File Checker                                          /|
+----------------------------------------------------------------+
|
| Check the public folder if the file exists, it should not
| be interpreted as a route
|
*/

if (
    isset($_SERVER['REQUEST_URI']) &&
    ! file_exists(public_path($_SERVER['REQUEST_URI']))
) {
    $_GET['_url' ] = $_SERVER['REQUEST_URI' ];
}
