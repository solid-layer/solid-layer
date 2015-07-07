<?php

$loader = new \Phalcon\Loader();

$config_loader = $GLOBALS['__config']->loader;

$loader
  ->registerDirs($config_loader->dirs->toArray())
  ->registerNamespaces($config_loader->namespaces->toArray())
  ->registerPrefixes($config_loader->prefixes->toArray())
  ->register();
