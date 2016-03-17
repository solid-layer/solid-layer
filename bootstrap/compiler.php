<?php

# Some classes breaks the compiler, to fix it, you must exclude those files.

$excluded_files = [
    'symfony/debug/Exception/FlattenException.php',
    'swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleMimeEntity.php',
];



#-------------------------------------------------------------------------------------------
# Don't change below, unless you know what you're doing.
#-------------------------------------------------------------------------------------------



require dirname(__DIR__).'/vendor/classpreloader/classpreloader/src/ClassLoader.php';

$config = new ClassPreloader\Config;
$loader = new ClassPreloader\ClassLoader;

# by calling the register(), this acts as a buffer to get all the
# php files loaded when calling the file autoload.php
$loader->register();
require dirname(__DIR__).'/bootstrap/autoload.php';
$loader->unregister();

foreach ($loader->getFilenames() as $loader_file) {
    foreach ($excluded_files as $excluded_file) {
        if (strpos($loader_file, url_trimmer($excluded_file)) !== false) {
            continue 2;
        }
    }

    $config->addFile($loader_file);
}


return $config;
