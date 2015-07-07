<?php

/*
* --------------------------------------------------------
* PhalconSlayer Autoloader
* ---------------------------------------------------------
* This config is based on the Phalcon\Loader class
*  visit: https://docs.phalconphp.com/en/latest/api/Phalcon_Loader.html
*/
return [
    'dirs' => [

    ],
    
    'namespaces' => [
        // Do not edit below if you don't know what you're doing.
        'App\Acl'                       => APP_ROOT . '/app/Acl/',
        'App\Adapters'                  => APP_ROOT . '/app/Adapters/',
        'App\Console'                   => APP_ROOT . '/app/Console/',
        'App\Controllers'               => APP_ROOT . '/app/Controllers/',
        'App\Exceptions'                => APP_ROOT . '/app/Exceptions/',
        'App\Models'                    => APP_ROOT . '/app/Models/',
        'App\Services'                  => APP_ROOT . '/app/Services/',
        'App\Validation'                => APP_ROOT . '/app/Validation/',
        'Bootstrap\Support\Auth'        => APP_ROOT . '/bootstrap/src/Support/Auth/',
        'Bootstrap\Support\Redirect'    => APP_ROOT . '/bootstrap/src/Support/Redirect/',
        'Bootstrap\Support\Phinx'       => APP_ROOT . '/bootstrap/src/Support/Phinx/',
        'Bootstrap\Support\Phalcon\Mvc' => APP_ROOT . '/bootstrap/src/Support/Phalcon/Mvc/',
        'Bootstrap\Support\Mail'        => APP_ROOT . '/bootstrap/src/Support/Mail/',
        'Bootstrap\Support\Lang'        => APP_ROOT . '/bootstrap/src/Support/Lang/',
        'Bootstrap\Console'             => APP_ROOT . '/bootstrap/src/Console/',
        'Bootstrap\Facades'             => APP_ROOT . '/bootstrap/src/Facades/',
        'Bootstrap\Services'            => APP_ROOT . '/bootstrap/src/Services/',
        'Bootstrap\Exceptions'          => APP_ROOT . '/bootstrap/src/Exceptions/',
    ],

    'prefixes' => [
        // 'ACL'          => APP_ROOT . '/bootstrap/src/Facades/ACL',
        // 'Auth'         => APP_ROOT . '/bootstrap/src/Facades/Auth',
        // 'Filter'       => APP_ROOT . '/bootstrap/src/Facades/Filter',
        // 'Flash'        => APP_ROOT . '/bootstrap/src/Facades/Flash',
        // 'FlashSession' => APP_ROOT . '/bootstrap/src/Facades/FlashSession',
        // 'Lang'         => APP_ROOT . '/bootstrap/src/Facades/Lang',
        // 'Mail'         => APP_ROOT . '/bootstrap/src/Facades/Mail',
        // 'Redirect'     => APP_ROOT . '/bootstrap/src/Facades/Redirect',
        // 'Request'      => APP_ROOT . '/bootstrap/src/Facades/Request',
        // 'Response'     => APP_ROOT . '/bootstrap/src/Facades/Response',
        // 'Route'        => APP_ROOT . '/bootstrap/src/Facades/Route',
        // 'Security'     => APP_ROOT . '/bootstrap/src/Facades/Security',
        // 'Session'      => APP_ROOT . '/bootstrap/src/Facades/Session',
        // 'Tag'          => APP_ROOT . '/bootstrap/src/Facades/Tag',
        // 'URL'          => APP_ROOT . '/bootstrap/src/Facades/URL',
        // 'View'         => APP_ROOT . '/bootstrap/src/Facades/View',
        // 'Whoops'       => APP_ROOT . '/bootstrap/src/Facades/Whoops',
    ],
];