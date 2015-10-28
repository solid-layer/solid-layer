<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'config';
    }
}
