<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Lang extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lang';
    }
}