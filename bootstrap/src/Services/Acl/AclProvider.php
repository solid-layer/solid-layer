<?php

namespace Bootstrap\Services\Acl;

use Phalcon\Acl\Resource;

/**
* @author Daison Carino <daison12006013 [at] gmail [dot] com>
*/
class AclProvider
{
    private $acl;

    public function __construct($acl)
    {
        $this->acl = $acl;
    }

    public function dispatch(AclContainer $obj)
    {
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