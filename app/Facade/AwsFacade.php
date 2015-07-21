<?php

namespace App\Facade;

use Bootstrap\Facades\Facade;

class AwsFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'aws'; }
}