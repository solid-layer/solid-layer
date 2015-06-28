<?php

$loader = new \Phalcon\Loader();

$loader
  ->registerNamespaces([
      'Bootstrap\Console'     => APP_ROOT . '/bootstrap/src/Console/',
      'Bootstrap\Phalcon\Mvc' => APP_ROOT . '/bootstrap/src/Phalcon/Mvc/',
      'Bootstrap\Facades'     => APP_ROOT . '/bootstrap/src/Facades/',
      'Bootstrap\Services'    => APP_ROOT . '/bootstrap/src/Services/',
      'Bootstrap\Exceptions'  => APP_ROOT . '/bootstrap/src/Exceptions/',
      
      'App\Acl'               => APP_ROOT . '/app/Acl/',
      'App\Console'           => APP_ROOT . '/app/Console/',
      'App\Controllers'       => APP_ROOT . '/app/Controllers/',
      'App\Exceptions'        => APP_ROOT . '/app/Exceptions/',
      'App\Migrations'        => APP_ROOT . '/app/Migrations/',
      'App\Models'            => APP_ROOT . '/app/Models/',
      'App\Services'          => APP_ROOT . '/app/Services/',
  ])
  ->register();
