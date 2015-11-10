<?php
namespace Bootstrap\Facades;

class Flysystem extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flysystem';
    }
}
