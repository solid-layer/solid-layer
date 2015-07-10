<?php

return [

    // add your path here ...

    /*
    |--------------------------------------------------------
    | PhalconSlayer Registered Path
    |---------------------------------------------------------
    | You can access this path using this function
    */

    # -- app
    'app'            => APP_ROOT . '/app/',
    'consoleDir'     => APP_ROOT . '/app/Console/',
    'collectionsDir' => APP_ROOT . '/app/Collections/',
    'controllersDir' => APP_ROOT . '/app/Controllers/',
    'modelsDir'      => APP_ROOT . '/app/Models/',
    'routesDir'      => APP_ROOT . '/app/Routes/',

    # -- database
    'database'       => APP_ROOT . '/database/',
    'migrationsDir'  => APP_ROOT . '/database/migrations/',

    # -- resources
    'resources'      => APP_ROOT . '/resources/',
    'viewsDir'       => APP_ROOT . '/resources/views/',
    'langDir'        => APP_ROOT . '/resources/lang/',

    # -- storage
    'storage'        => APP_ROOT . '/storage/',
    'cacheDir'       => APP_ROOT . '/storage/cache/',
    'logsDir'        => APP_ROOT . '/storage/logs/',
    'sessionDir'     => APP_ROOT . '/storage/session/',
    'storageViewDir' => APP_ROOT . '/storage/views/',

    'sandbox'        => APP_ROOT . '/sandbox/',
    'config'         => APP_ROOT . '/config/',
    'public'         => APP_ROOT . '/public/',

    # -- system base path
    'baseUri'        => APP_ROOT,
];