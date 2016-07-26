<?php

define('SLAYER_START', microtime(true));
define('BASE_PATH', dirname(__DIR__));

error_reporting(-1);

if (!extension_loaded('phalcon')) {
    echo 'Phalcon extension required.'.PHP_EOL;
    exit;
}


/*
+----------------------------------------------------------------+
|\ Compiled Classes                                             /|
+----------------------------------------------------------------+
|
| check if there is existing compiled class then require the file
|
*/

$compiled = BASE_PATH .'/storage/slayer/compiled.php';

if (file_exists($compiled)) {
    require $compiled;
}


/*
+----------------------------------------------------------------+
|\ Dependencies                                                 /|
+----------------------------------------------------------------+
|
| call composer autoload to call all dependencies
|
*/

require BASE_PATH.'/vendor/autoload.php';


/*
+----------------------------------------------------------------+
|\ Environmental Configuration                                  /|
+----------------------------------------------------------------+
|
| a better way to configure specific server configuration
| by creating  '.env' file in the root
|
*/

if (file_exists(BASE_PATH.'/.env')) {
    $dotenv = new Dotenv\Dotenv(
        dirname(url_trimmer(BASE_PATH.'/.env'))
    );

    $dotenv->load();
}


/*
+----------------------------------------------------------------+
|\ System Start Up                                              /|
+----------------------------------------------------------------+
|
| instantiate the main kernel and set-up the configurations
| such as paths and modules
|
*/

$kernel = new Clarity\Kernel\Kernel;

$path = require url_trimmer(__DIR__.'/path.php');
$modules = require url_trimmer(BASE_PATH.'/app/modules.php');

$kernel
    ->setPath($path)
    ->setModules($modules)
    ->setEnvironment(env('APP_ENV', 'production'))
    ->initialize();


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
    php_sapi_name() !== 'cli' &&
    !file_exists(public_path($_SERVER[ 'REQUEST_URI' ]))
) {
    $_GET[ '_url' ] = $_SERVER[ 'REQUEST_URI' ];
}


/*
+----------------------------------------------------------------+
|\ Multiple DB Connection Service                               /|
+----------------------------------------------------------------+
|
| For us to be able to re-use the db adapters in our model we
| must create a service with them.
|
| Here, we added a prefix 'db_' to make it unique and not to
| over-ride other providers.
|
| In your model's initialize() function, you may call it this way:
|   $this->setConnectionService('db_pgsql');
|
| Un-comment below to activate things
|
*/

// foreach (config('database.adapters') as $adapter_alias => $adapter) {
//     di([
//         # e.g(db_mysql, db_sqlite, db_pgsql, etc..)
//         'db_'.$adapter_alias,

//         # the call back of this dependency injection
//         function () use ($adapter_alias) {
//             return Clarity\Providers\DB::connection($adapter_alias);
//         }
//     ]);
// }
