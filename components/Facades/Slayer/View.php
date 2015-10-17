<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'view';
    }
}