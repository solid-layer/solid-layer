<?php

namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Security extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'security';
    }
}