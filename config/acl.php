<?php

return [

    # ----------------------------------------------------------------
    # Register all the roles you have
    # ----------------------------------------------------------------
    # - By default we're using 'administrator' and 'user'

    'roles'   => [
        'administrator',
        'user',
    ],



    # ----------------------------------------------------------------
    # Filter Classes
    # ----------------------------------------------------------------
    # - Register your class to load

    'classes' => [
        'default' => Components\Filters\Access::class,
        'csrf'    => Components\Filters\CSRF::class,
        'auth'    => Components\Filters\Auth::class,
    ],

]; # - end of return