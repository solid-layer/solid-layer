<?php

namespace App\Services;

use Bootstrap\Services\Service\ServiceContainer;
use Bootstrap\Services\Acl\AclProvider;
use Phalcon\Acl\Role;
use Phalcon\Acl as Phalcon_Acl;
use Phalcon\Acl\Adapter\Memory as Phalcon_Acl_Adapter_Memory;

class ACL extends ServiceContainer
{
    public $_alias = 'acl';

    public $_shared = false;

    public function boot()
    {
        $acl = new Phalcon_Acl_Adapter_Memory;
        $acl->setDefaultAction(Phalcon_Acl::DENY);

        foreach ($this->getConfig()->acl->roles as $role) {
            $acl->addRole(new Role($role));
        }

        return $acl;
    }
}