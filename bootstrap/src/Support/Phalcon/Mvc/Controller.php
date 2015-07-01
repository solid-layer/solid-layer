<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Bootstrap\Services\Acl\AclContainer;
use Bootstrap\Facades\Route;
use Bootstrap\Facades\ACL;
use Phalcon\Acl\Resource;

class Controller extends \Phalcon\Mvc\Controller
{
    private $action_name;
    private $controller_name;
    private $options = [];
    private $only_actions = [];
    private $except_actions = [];

    /**
     * This will be called first by Default from Phalcon Docs
     */
    public function beforeExecuteRoute($dispatcher)
    {
        $this->action_name = $dispatcher->getActionName();
        $this->controller_name = $dispatcher->getControllerName();
    }


    /**
     * If user's will be calling acl
     */
    public function acl($alias, $options = [])
    {
        # set the options
        $this->options = $options;

        # set the only/except actions
        $this->only_actions = $this->_getOnlyActions();
        $this->except_actions = $this->_getExceptActions();

        # now load the class
        $class = slayer_config()->acl->classes[$alias];
        $this->_loader(new $class);
    }


    private function _valueToKeyCombiner($records)
    {
        # make the value as key as well
        foreach ($records as $idx => $record) {
            $records[$record] = $record;
            unset($records[$idx]);
        }

        return $records;
    }


    private function _getOnlyActions()
    {
        if (! isset($this->options['only'])) {
            return [];
        }

        return $this->_valueToKeyCombiner($this->options['only']);
    }


    private function _getExceptActions()
    {
        if (! isset($this->options['except'])) {
            return [];
        }

        return $this->_valueToKeyCombiner($this->options['except']);
    }


    private function _loader(AclContainer $obj)
    {
        if (count($this->options)) {
            if ( isset($this->only_actions[$this->action_name]) == false ) {
                return;
            }

            if ( isset($this->except_actions[$this->action_name]) ) {
                return;
            }
        }

        ACL::addResource(new Resource($this->controller_name), $this->action_name);

        if (count($obj->getAllowedRoles())) {
            foreach ($obj->getAllowedRoles() as $role) {
                ACL::allow($role, $this->controller_name, $this->action_name);
            }
        }

        if (count($obj->getAllowedRoles())) {
            foreach ($obj->getDeniedRoles() as $role) {
                ACL::deny($role, $this->controller_name, $this->action_name);
            }
        }

        $obj->load();
    }
}