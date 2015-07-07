<?php

return [

    // add your path here ...

    /*
    * --------------------------------------------------------
    * PhalconSlayer Registered Path
    * ---------------------------------------------------------
    * You can access this path using this function
    */

    # -- app
    'consoleDir'     => APP_ROOT . '/app/Console/',             //slayer_config()->path->consoleDir
    'collectionsDir' => APP_ROOT . '/app/Collections/',         //slayer_config()->path->collectionsDir
    'controllersDir' => APP_ROOT . '/app/Controllers/',         //slayer_config()->path->controllersDir
    'modelsDir'      => APP_ROOT . '/app/Models/',              //slayer_config()->path->modelsDir
    'routesDir'      => APP_ROOT . '/app/Routes/',              //slayer_config()->path->routesDir

    # -- database
    'migrationsDir'  => APP_ROOT . '/database/migrations/',     //slayer_config()->path->migrationsDir

    # -- resources
    'viewsDir'       => APP_ROOT . '/resources/views/',         //slayer_config()->path->viewsDir
    'langDir'        => APP_ROOT . '/resources/lang/',          //slayer_config()->path->langDir

    # -- storage
    'cacheDir'       => APP_ROOT . '/storage/cache/',           //slayer_config()->path->cacheDir
    'logsDir'        => APP_ROOT . '/storage/logs/',            //slayer_config()->path->logsDir
    'sessionDir'     => APP_ROOT . '/storage/session/',         //slayer_config()->path->sessionDir
    'storageViewDir' => APP_ROOT . '/storage/views/',           //slayer_config()->path->storageViewDir

    # -- system base path
    'baseUri'        => APP_ROOT,                               //slayer_config()->path->baseUri
];