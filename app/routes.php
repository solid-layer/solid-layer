<?php

# ------------------------------------------------------------
# Creating Routes
# ------------------------------------------------------------
# ---- You can use the Facade Route, or to use
# the function that pulls the same DI

Route::addGet('/', [
    'controller' => 'Welcome',
    'action'     => 'showSignature',
]);

# ---- the above code is the same as below
// Route::get('/', [
//     'controller' => 'Welcome',
//     'action'     => 'showSignature',
// ]);

# ---- you could also apply the alternative code below
// Route::get('/', [
//     'uses' => 'WelcomeController@showSignature',
// ]);


# -------------------------------------------------------------
# Organized Routes using RouteGroup
# -------------------------------------------------------------
# ---- You can manage to create your own routes
# from a class, try to check the class located at app/Routes/

Route::mount(new App\Routes\AuthRoutes);
Route::mount(new App\Routes\NewsfeedRoutes);