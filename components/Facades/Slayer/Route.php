<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'router';
    }
}
