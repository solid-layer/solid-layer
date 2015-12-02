<?php

require dirname(__DIR__) . '/vendor/classpreloader/classpreloader/src/ClassLoader.php';

$config = new \ClassPreloader\Config;
$loader = new \ClassPreloader\ClassLoader;


# - by calling the register(), this acts as a buffer to get all the
# php files loaded when calling the file autoload.php

$loader->register();
require dirname(__DIR__) . '/bootstrap/autoload.php';
$loader->unregister();


# - the listed php files below are ignored upon running the optimize
# command.
#
# - this refers a namespace closure issues, to make your optimize command
# work

$ignored = [
    'symfony/debug/Exception/FlattenException.php',
    'swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleMimeEntity.php',
];

foreach ($loader->getFilenames() as $file) {
    foreach ($ignored as $ignored_file) {
        if (strpos($file, url_trimmer($ignored_file)) !== false) {
            continue 2;
        }
    }

    $config->addFile($file);
}


return $config;
