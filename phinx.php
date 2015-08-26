<?php

require_once BASE_PATH . '/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(BASE_PATH);
$dotenv->load();

$env = env('APP_ENV');

return [
    'paths'        => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database'        => $env,
        $env                      => [
            'adapter' => env('DB_ADAPTER', 'mysql'),
            'host'    => env('DB_HOST', 'localhost'),
            'name'    => env('DB_DATABASE'),
            'user'    => env('DB_USERNAME'),
            'pass'    => env('DB_PASSWORD'),
            'port'    => env('DB_PORT'),
            'charset' => env('DB_CHARSET'),
        ],
    ],
];