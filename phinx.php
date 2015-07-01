<?php

require_once APP_ROOT . '/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(APP_ROOT);
$dotenv->load();

$env = getenv('APP_ENV');

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'slayer_phinx_log',
        'default_database' => $env,
        $env => [
            'adapter' => getenv('DB_ADAPTER'),
            'host'    => getenv('DB_HOST'),
            'name'    => getenv('DB_DATABASE'),
            'user'    => getenv('DB_USERNAME'),
            'pass'    => getenv('DB_PASSWORD'),
            'port'    => getenv('DB_PORT'),
            'charset' => getenv('DB_CHARSET'),
        ]
    ],
];