<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Bootstrap\Services\Acl\AclContainer;
use Bootstrap\Facades\ACL as FacadeACL;
use Phalcon\Acl\Resource;

class AclLoader
{
    private $obj;
    private $options;
    private $only_actions;
    private $except_actions;
    private $action_name;
    private $controller_name;

    public function __construct(AclContainer $obj)
    {
        $this->obj = $obj;
    }

    public function setActionName($action_name)
    {
        $this->action_name = $action_name;

        return $this;
    }

    public function setControllerName($controller_name)
    {
        $this->controller_name = $controller_name;

        return $this;
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    public function setOnlyActions($actions)
    {
        $this->only_actions = $actions;

        return $this;
    }

    public function setExceptActions($actions)
    {
        $this->except_actions = $actions;

        return $this;
    }

    public function load()
    {
        if (count($this->options)) {
            if (isset( $this->only_actions[ $this->action_name ] ) == false) {
                return;
            }

            if (isset( $this->except_actions[ $this->action_name ] )) {
                return;
            }
        }

        FacadeACL::addResource(
            new Resource($this->controller_name),
            $this->action_name
        );

        if (count($this->obj->getAllowedRoles())) {
            foreach ($this->obj->getAllowedRoles() as $role) {
                FacadeACL::allow(
                    $role,
                    $this->controller_name,
                    $this->action_name
                );
            }
        }

        if (count($this->obj->getAllowedRoles())) {
            foreach ($this->obj->getDeniedRoles() as $role) {
                FacadeACL::deny(
                    $role,
                    $this->controller_name,
                    $this->action_name
                );
            }
        }

        $this->obj->load();
    }
}
