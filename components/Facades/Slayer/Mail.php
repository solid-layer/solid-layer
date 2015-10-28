<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class Mail extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mail';
    }
}
