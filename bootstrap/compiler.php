<?php

# Some classes breaks the compiler, to apply workaround, you must exclude
# those files.
$excluded_files = [
    'symfony/debug/Exception/FlattenException.php',
    'swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleMimeEntity.php',
];


/*
 +------------------------------------------------------------------------------
 | Compiler / Combiner
 +------------------------------------------------------------------------------
 |
 | Below code will list all available classes, the classpreloader package
 | helps us to do this, it will combine all the classes into one (1)
 | compiled classes.
 |
 | Don't change, unless you know what you're doing.
 |
 +------------------------------------------------------------------------------
 */

$config = new ClassPreloader\Config;
$loader = new ClassPreloader\ClassLoader;

# by calling the register(), this acts as a buffer to get all the
# php files loaded when calling the file autoload.php
$loader->register();
require __DIR__.'/autoload.php';
$loader->unregister();

foreach ($loader->getFilenames() as $loader_file) {

    foreach ($excluded_files as $e_file) {

        if (strpos($loader_file, url_trimmer($e_file)) !== false) {
            continue 2;
        }
    }

    $config->addFile($loader_file);
}

return $config;
