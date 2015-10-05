<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Bootstrap\Services\Acl\AclContainer;
use Bootstrap\Facades\ACL;
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
        if (!empty($this->options)) {
            if (isset( $this->only_actions[ $this->action_name ] ) == false) {
                return;
            }

            if (isset( $this->except_actions[ $this->action_name ] )) {
                return;
            }
        }

        ACL::addResource(
            new Resource($this->controller_name),
            $this->action_name
        );

        if (!empty($this->obj->getAllowedRoles())) {
            foreach ($this->obj->getAllowedRoles() as $role) {
                ACL::allow(
                    $role,
                    $this->controller_name,
                    $this->action_name
                );
            }
        }

        if (!empty($this->obj->getDeniedRoles())) {
            foreach ($this->obj->getDeniedRoles() as $role) {
                ACL::deny(
                    $role,
                    $this->controller_name,
                    $this->action_name
                );
            }
        }

        $this->obj->load();
    }
}
