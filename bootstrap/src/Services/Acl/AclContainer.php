<?php

namespace Bootstrap\Services\Acl;

use Bootstrap\Services\ServiceMagicMethods;

class AclContainer
{
    use ServiceMagicMethods;

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