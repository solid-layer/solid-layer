<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Tag extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tag';
    }
}
