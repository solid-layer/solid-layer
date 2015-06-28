<?php

namespace Bootstrap\Services;

use Phalcon\Acl\Resource;

class AclProvider
{
    private $acl;

    public function __construct($acl)
    {
        $this->acl = $acl;
    }

    public function dispatch($cls)
    {
        $obj = new $cls;

        foreach ($obj->getHandlers() as $controller => $actions) {
            $this->acl->addResource(new Resource($controller), $actions);
            foreach ($actions as $action) {
                foreach ($obj->getAllowedRoles() as $role) {
                    $this->acl->allow($role, $controller, $action);
                }

                foreach ($obj->getDeniedRoles() as $role) {
                    $this->acl->deny($role, $controller, $action);
                }
            }
        }
    }   
}