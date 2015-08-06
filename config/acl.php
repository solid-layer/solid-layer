<?php

return [

    # ------------------------------------------------------------
    # Register all the roles you have
    # ------------------------------------------------------------
    # ---- By default we're using 'administrator' and 'user'
    'roles' => [
        'administrator',
        'user',
    ],



    # ------------------------------------------------------------
    # Acl Classes
    # ------------------------------------------------------------
    # ---- Register your class to load
    'classes' => [
        'default' => App\Acl\Access::class,
        'csrf'    => App\Acl\CSRF::class,
        'auth'    => App\Acl\Auth::class,
    ],

]; # - end of return