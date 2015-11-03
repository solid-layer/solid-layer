<?php

require dirname(__DIR__) . '/vendor/classpreloader/classpreloader/src/ClassLoader.php';

use ClassPreloader\ClassLoader;

$config = ClassLoader::getIncludes(function (ClassLoader $loader) {
    $loader->register();

    require dirname(__DIR__) . '/bootstrap/autoload.php';
});

$config->addExclusiveFilter('/Swift\/Mime\/SimpleMessage/');

return $config;
