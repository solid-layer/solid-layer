<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class FlashBag extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flash_bag';
    }
}