<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class URL extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'url';
    }
}