<?php

use Bootstrap\Facades\Route;

Route::add('/acme/test', [
    'module'     => 'acme',
    'controller' => 'Acme',
    'action'     => 'test',
]);