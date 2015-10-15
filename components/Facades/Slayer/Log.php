<?php

namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Log extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'log';
    }
}