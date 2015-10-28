<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Filter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filter';
    }
}
