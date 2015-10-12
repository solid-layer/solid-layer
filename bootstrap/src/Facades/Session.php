<?php

namespace Bootstrap\Facades;

class Session extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'session';
    }
}