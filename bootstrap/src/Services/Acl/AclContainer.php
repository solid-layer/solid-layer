<?php

namespace Bootstrap\Services\Acl;

/**
* @author Daison Carino <daison12006013 [at] gmail [dot] com>
*/
class AclContainer
{
    protected $_allowed_roles = [];
    protected $_denied_roles = [];

    public function getAllowedRoles()
    {
        return $this->_allowed_roles;
    }

    public function getDeniedRoles()
    {
        return $this->_denied_roles;
    }
}