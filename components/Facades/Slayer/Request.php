<?php

namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Request extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'request';
    }
}