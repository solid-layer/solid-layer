<?php
namespace Bootstrap\Facades;

class ACL extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'acl';
    }
}
