<?php

namespace Bootstrap\Facades;

class Mail extends Facade
{
    protected static function getFacadeAccessor() { return 'mail'; }
}