<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Redirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redirect';
    }
}