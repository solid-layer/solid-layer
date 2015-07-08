<?php

/*
|--------------------------------------------------------
| PhalconSlayer Autoloader
|---------------------------------------------------------
| This config is based on the Phalcon\Loader class
|   visit: https://docs.phalconphp.com/en/latest/api/Phalcon_Loader.html
*/
return [
    'dirs' => [],
    
    'namespaces' => [
        // Do not edit below if you don't know what you're doing.
        'App'       => APP_ROOT . '/app/',
        'Bootstrap' => APP_ROOT . '/bootstrap/src/',
    ],

    'prefixes' => [],
];