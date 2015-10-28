<?php
namespace Components\Facades\Slayer;

use Bootstrap\Facades\Facade;

class ACL extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'acl';
    }
}
