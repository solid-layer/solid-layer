<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Flash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}