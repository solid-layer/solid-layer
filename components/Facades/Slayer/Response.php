<?php

namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'response';
    }
}