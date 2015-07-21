<?php

$loader = new \Phalcon\Loader;

$loader
    ->registerDirs([

    ])
    ->registerNamespaces([
        'App'         => APP_ROOT . '/app/',
        'Bootstrap'   => APP_ROOT . '/bootstrap/src/',
        
        'Sandbox'     => APP_ROOT . '/sandbox/',
    ])
    ->registerPrefixes([

    ])
    ->register();