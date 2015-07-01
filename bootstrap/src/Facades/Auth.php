<?php

namespace Bootstrap\Facades;

class Auth extends Facade
{
    protected static function getFacadeAccessor() { return 'slayer_auth'; }
}