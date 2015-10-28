<?php
namespace Components\Facades;

use Bootstrap\Facades\Facade;

class FileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flysystem';
    }
}
