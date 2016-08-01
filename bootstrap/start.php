<?php

$kernel = require_once __DIR__.'/autoload.php';

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
    !file_exists(public_path($_SERVER['REQUEST_URI']))
) {
    $_GET['_url' ] = $_SERVER['REQUEST_URI' ];
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
| over-ride other services.
|
| In your model's initialize() function, you may call it this way:
|   $this->setConnectionService('db_pgsql');
|
| Un-comment below to activate the sample configuration
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
