<?php

namespace Bootstrap\Facades;

class FlashBag extends Facade
{
    protected static function getFacadeAccessor() { return 'flash_bag'; }
}