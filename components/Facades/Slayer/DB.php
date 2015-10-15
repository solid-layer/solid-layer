<?php

namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class DB extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'db';
    }
}