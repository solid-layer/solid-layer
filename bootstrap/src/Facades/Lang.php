<?php

namespace Bootstrap\Facades;

class Lang extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lang';
    }
}