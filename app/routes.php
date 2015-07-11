<?php

/*
|-------------------------------------------------------------
| Creating Routes
|-------------------------------------------------------------
| You can use the Facade Route, or to use the function that
| pulls the same DI
*/

Route::add('/', [
    'controller' => 'Welcome',
    'action'     => 'showSignature',
]);



/*
|-------------------------------------------------------------
| Organized Routes using RouteGroup
|-------------------------------------------------------------
| You can manage to create your own routes from a class, try
| to check the class located at app/Routes/
*/

include __DIR__ . '/Routes/AuthRoutes.php';
Route::mount(new AuthRoutes);

include __DIR__ . '/Routes/NewsfeedRoutes.php';
Route::mount(new NewsfeedRoutes);