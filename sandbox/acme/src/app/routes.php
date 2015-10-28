<?php

use Components\Facades\Slayer\Route;

Route::add('/acme/test', [
    'module'     => 'acme',
    'controller' => 'Acme',
    'action'     => 'test',
]);
