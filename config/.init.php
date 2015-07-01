<?php

return [

    // add your config below
    // to access your config, you may call 
    // slayer_config()->{key}->{file_array}

    /*
    * --------------------------------------------------------
    * PhalconSlayer Dependecies
    * ---------------------------------------------------------
    * Do not edit below, if you don't know what you're
    * doing, instead add your own dependecies
    */
    'app'      => require_once APP_ROOT . '/config/app.php',
    'acl'      => require_once APP_ROOT . '/config/acl.php',
    'consoles' => require_once APP_ROOT . '/config/consoles.php',
    'database' => require_once APP_ROOT . '/config/database.php',
    'path'     => require_once APP_ROOT . '/config/path.php',
    'services' => require_once APP_ROOT . '/config/services.php',
    'loader'   => require_once APP_ROOT . '/config/loader.php',
];