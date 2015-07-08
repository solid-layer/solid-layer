<?php

return [

    // add your config below
    // to access your config, you may call 
    // config()->{key}->{file_array}

    /*
    |--------------------------------------------------------
    | PhalconSlayer Files
    |---------------------------------------------------------
    | Do not edit below, if you don't know what you're
    | doing, instead add your own dependecies
    */
    'app'      => require_once __DIR__ . '/app.php',
    'acl'      => require_once __DIR__ . '/acl.php',
    'consoles' => require_once __DIR__ . '/consoles.php',
    'database' => require_once __DIR__ . '/database.php',
    'path'     => require_once __DIR__ . '/path.php',
    'loader'   => require_once __DIR__ . '/loader.php',
    'mailer'   => require_once __DIR__ . '/mailer.php',
];