<?php

namespace Bootstrap\Facades;

class FlashSession extends Facade
{
    protected static function getFacadeAccessor() { return 'flashSession'; }
}