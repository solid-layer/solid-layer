<?php
namespace Bootstrap\Facades;

class FlysystemManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flysystem_manager';
    }
}
