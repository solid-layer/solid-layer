<?php

define('BASE_PATH', dirname(__DIR__));

use ClassPreloader\ClassLoader;

require BASE_PATH . '/vendor/classpreloader/classpreloader/src/ClassLoader.php';

$config = ClassLoader::getIncludes(function (ClassLoader $loader) {
    $loader->register();
});

$files = include BASE_PATH . '/config/compile.php';

foreach ($files as $file) {
    if ( file_exists($file) ) {
        $config->addFile($file);
    }
}

return $config;
