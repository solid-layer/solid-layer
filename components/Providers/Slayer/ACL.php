<?php
namespace Components\Providers\Slayer;

use Phalcon\Acl as PhalconACL;
use Phalcon\Acl\Role as PhalconRole;
use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Acl\Adapter\Memory as PhalconMemoryAdapter;

class ACL extends ServiceProvider
{
    protected $alias  = 'acl';
    protected $shared = true;

    public function register()
    {
        $acl = new PhalconMemoryAdapter;
        $acl->setDefaultAction(config()->acl->default_action);

        return $acl;
    }
}