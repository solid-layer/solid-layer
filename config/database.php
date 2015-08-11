<?php

return [
    'adapter'  => env('DB_ADAPTER', 'mysql'),
    'host'     => env('DB_HOST', 'localhost'),
    'port'     => env('DB_PORT', 3306),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', 'password'),
    'dbname'   => env('DB_DATABASE', 'slayer'),
    'charset'  => env('DB_CHARSET', 'utf8'),
];