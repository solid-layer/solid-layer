<?php
namespace Bootstrap\Facades;

class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'config';
    }
}
