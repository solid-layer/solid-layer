<?php

use Bootstrap\Facades\Route;

/*
|-------------------------------------------------------------
| Creating Routes
|-------------------------------------------------------------
| You can use the Facade Route, or to use the function that
| pulls the DI
|
| Example:
|  route()->add('/', [
|    'namespace' => 'App\Controllers',
|    'controller' => 'Welcome',
|    'action' => 'showSignature',
|  ]);
*/
Route::add('/', [
  'namespace' => 'App\Controllers',
  'controller' => 'Welcome',
  'action' => 'showSignature',
]);


/*
|-------------------------------------------------------------
| Organized Routes using RouteGroup
|-------------------------------------------------------------
| You can manage to create your own routes from a class, try
| to check the class located at app/Routes/
*/
include __DIR__ . '/Routes/AuthRoutes.php';
route()->mount(new AuthRoutes);

include __DIR__ . '/Routes/NewsfeedRoutes.php';
route()->mount(new NewsfeedRoutes);