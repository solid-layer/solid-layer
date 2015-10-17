<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Session extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'session';
    }
}