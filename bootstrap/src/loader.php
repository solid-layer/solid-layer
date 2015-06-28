<?php

$loader = new \Phalcon\Loader();

$loader
  ->registerNamespaces([
      'Bootstrap\Phalcon\Mvc' => APP_ROOT . '/bootstrap/src//Phalcon/Mvc/',
      'Bootstrap\Facades'     => APP_ROOT . '/bootstrap/src//Facades/',
      'Bootstrap\Services'    => APP_ROOT . '/bootstrap/src//Service/',
      'Bootstrap\Exceptions'  => APP_ROOT . '/bootstrap/src//Exceptions/',
      'App\Controllers'       => APP_ROOT . '/app/Controllers/',
      'App\Exceptions'        => APP_ROOT . '/app/Exceptions/',
      'App\Migrations'        => APP_ROOT . '/app/Migrations/',
      'App\Models'            => APP_ROOT . '/app/Models/',
      'App\Services'          => APP_ROOT . '/app/Services/',
  ])
  ->register();
