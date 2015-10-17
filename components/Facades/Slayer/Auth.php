<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Auth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth';
    }
}