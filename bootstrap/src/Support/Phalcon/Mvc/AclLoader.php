<?php
namespace Bootstrap\Support\Phalcon\Mvc;

use Phalcon\Acl\Resource;

class AclLoader
{
    private $action;
    private $controller;

    public function __construct()
    {
        $this->controller = di()->get('router')->getControllerName();
        $this->action     = di()->get('router')->getActionName();
    }

    public function load()
    {
        di()->get('acl')->addResource(
            new Resource($this->controller),
            $this->action
        );

        $allowed_roles = di()->get('config')->acl->allowed->toArray();
        foreach ($allowed_roles as $role_name => $role) {
            foreach ($role as $controller) {
                $attr = explode('::', $controller);

                $name = $attr[0];

                if ( $name !== $this->controller) {
                    continue;
                }

                $actions = explode(',', $attr[1]);

                foreach ($actions as $action) {
                    di()->get('acl')->allow(
                        $role_name,
                        $name,
                        $action
                    );
                }
            }
        }

        $denied_roles  = di()->get('config')->acl->denied->toArray();
        foreach ($denied_roles as $role_name => $role) {
            foreach ($role as $controller) {
                $attr = explode('::', $controller);

                $name = $attr[0];

                if ( $name !== $this->controller ) {
                    continue;
                }

                $actions = explode(',', $attr[1]);

                foreach ($actions as $action) {
                    di()->get('acl')->deny(
                        $role_name,
                        $name,
                        $action
                    );
                }
            }
        }

        return;
    }
}
