<?php

use Bootstrap\Facades\Route;

Route::add('/sandbox/test', [
    'module' => 'sandbox',
    'controller' => 'Sandbox',
    'action' => 'test',
]);