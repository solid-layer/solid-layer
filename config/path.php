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
    'consoleDir'     => APP_ROOT . '/app/Console/',             //config()->path->consoleDir
    'collectionsDir' => APP_ROOT . '/app/Collections/',         //config()->path->collectionsDir
    'controllersDir' => APP_ROOT . '/app/Controllers/',         //config()->path->controllersDir
    'modelsDir'      => APP_ROOT . '/app/Models/',              //config()->path->modelsDir
    'routesDir'      => APP_ROOT . '/app/Routes/',              //config()->path->routesDir

    # -- database
    'migrationsDir'  => APP_ROOT . '/database/migrations/',     //config()->path->migrationsDir

    # -- resources
    'viewsDir'       => APP_ROOT . '/resources/views/',         //config()->path->viewsDir
    'langDir'        => APP_ROOT . '/resources/lang/',          //config()->path->langDir

    # -- storage
    'cacheDir'       => APP_ROOT . '/storage/cache/',           //config()->path->cacheDir
    'logsDir'        => APP_ROOT . '/storage/logs/',            //config()->path->logsDir
    'sessionDir'     => APP_ROOT . '/storage/session/',         //config()->path->sessionDir
    'storageViewDir' => APP_ROOT . '/storage/views/',           //config()->path->storageViewDir

    # -- system base path
    'baseUri'        => APP_ROOT,                               //config()->path->baseUri
];