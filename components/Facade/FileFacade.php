<?php

namespace Components\Facade;

use Bootstrap\Facades\Facade;

class FileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flysystem';
    }
}