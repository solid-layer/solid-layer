<?php

namespace Bootstrap\Facades;

class Redirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redirect';
    }
}