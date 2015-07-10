<?php

namespace App\Providers;

use Bootstrap\Services\Service\ServiceProvider;
use Phalcon\Acl\Role;
use Phalcon\Acl as Phalcon_Acl;
use Phalcon\Acl\Adapter\Memory as Phalcon_Acl_Adapter_Memory;

class ACL extends ServiceProvider
{
    public $_alias = 'acl';

    public $_shared = false;

    public function register()
    {
        $acl = new Phalcon_Acl_Adapter_Memory;
        $acl->setDefaultAction(Phalcon_Acl::DENY);

        foreach (config()->acl->roles as $role) {
            $acl->addRole(new Role($role));
        }

        return $acl;
    }
}