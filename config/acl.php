<?php

return [
    
    /*
    * --------------------------------------------------------
    * Register all the roles you have
    * ---------------------------------------------------------
    * By default we're using 'users' and 'guests'
    */
    'roles' => [
        'users',
        'guests',
    ],


    /*
    * --------------------------------------------------------
    * Acl Classes
    * ---------------------------------------------------------
    * Register your class to limit an access
    */
    'classes' => [
        'default' => App\Acl\DefaultRestriction::class,
    ],
];