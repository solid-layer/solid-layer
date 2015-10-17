<?php
namespace Components\Providers\Slayer;

use Phalcon\Acl as PhalconACL;
use Phalcon\Acl\Role as PhalconRole;
use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Acl\Adapter\Memory as PhalconMemoryAdapter;

class ACL extends ServiceProvider
{
    protected $alias  = 'acl';
    protected $shared = false;

    public function register()
    {
        $acl = new PhalconMemoryAdapter;
        $acl->setDefaultAction(PhalconACL::DENY);

        foreach (config()->acl->roles as $role) {
            $acl->addRole(new PhalconRole($role));
        }

        return $acl;
    }
}