<?php

return [
    'baseUri'        => BASE_PATH,

    # - app
    'app'            => BASE_PATH . '/app/',
    'consoleDir'     => BASE_PATH . '/app/Console/',
    'collectionsDir' => BASE_PATH . '/app/Collections/',
    'controllersDir' => BASE_PATH . '/app/Controllers/',
    'modelsDir'      => BASE_PATH . '/app/Models/',
    'routesDir'      => BASE_PATH . '/app/Routes/',

    # - database
    'database'       => BASE_PATH . '/database/',
    'migrationsDir'  => BASE_PATH . '/database/migrations/',

    # - resources
    'resources'      => BASE_PATH . '/resources/',
    'viewsDir'       => BASE_PATH . '/resources/views/',
    'langDir'        => BASE_PATH . '/resources/lang/',

    # - storage
    'storage'        => BASE_PATH . '/storage/',
    'cacheDir'       => BASE_PATH . '/storage/cache/',
    'logsDir'        => BASE_PATH . '/storage/logs/',
    'sessionDir'     => BASE_PATH . '/storage/session/',
    'storageViewDir' => BASE_PATH . '/storage/views/',

    'sandbox'        => BASE_PATH . '/sandbox/',
    'config'         => BASE_PATH . '/config/',
    'public'         => BASE_PATH . '/public/',
];