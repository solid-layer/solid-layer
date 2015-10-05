<?php

namespace Bootstrap\Facades;

class Security extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'security';
    }
}