<?php

namespace Bootstrap\Facades;

class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'response';
    }
}