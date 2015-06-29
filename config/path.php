<?php

return [

    // add your path here ...

    /*
    * --------------------------------------------------------
    * PhalconSlayer Registered Path
    * ---------------------------------------------------------
    * You can access this paths using this function
    */
    'consoleDir'     => APP_ROOT . '/app/Console',              //slayer_config()->path->consoleDir
    'controllersDir' => APP_ROOT . '/app/Controllers/',         //slayer_config()->path->controllersDir
    'modelsDir'      => APP_ROOT . '/app/Models/',              //slayer_config()->path->modelsDir
    'migrationsDir'  => APP_ROOT . '/database/migrations/',     //slayer_config()->path->migrationsDir
    'viewsDir'       => APP_ROOT . '/resources/views/',         //slayer_config()->path->viewsDir
    'storageViewDir' => APP_ROOT . '/storage/views/',           //slayer_config()->path->storageViewDir
    'baseUri'        => APP_ROOT,                               //slayer_config()->path->baseUri
];