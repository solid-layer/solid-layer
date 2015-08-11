<?php

return [

    # ---- add your path here ...


    # ---- app
    'app'            => app_path(),
    'consoleDir'     => APP_ROOT . '/app/Console/',
    'collectionsDir' => APP_ROOT . '/app/Collections/',
    'controllersDir' => APP_ROOT . '/app/Controllers/',
    'modelsDir'      => APP_ROOT . '/app/Models/',
    'routesDir'      => APP_ROOT . '/app/Routes/',


    # ---- database
    'database'       => database_path(),
    'migrationsDir'  => APP_ROOT . '/database/migrations/',


    # ---- resources
    'resources'      => resources_path(),
    'viewsDir'       => APP_ROOT . '/resources/views/',
    'langDir'        => APP_ROOT . '/resources/lang/',


    # ---- storage
    'storage'        => storage_path(),
    'cacheDir'       => APP_ROOT . '/storage/cache/',
    'logsDir'        => APP_ROOT . '/storage/logs/',
    'sessionDir'     => APP_ROOT . '/storage/session/',
    'storageViewDir' => APP_ROOT . '/storage/views/',
    'sandbox'        => sandbox_path(),
    'config'         => config_path(),
    'public'         => public_path(),


    # ---- system base path
    'baseUri'        => base_path(),
];