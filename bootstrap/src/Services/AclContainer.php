<?php

namespace Bootstrap\Services;

class AclContainer
{
    public function getHandlers()
    {
        return $this->_handlers;
    }

    public function getAllowedRoles()
    {
        return $this->_allowed_roles;
    }

    public function getDeniedRoles()
    {
        return $this->_denied_roles;
    }
}