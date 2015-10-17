<?php
namespace Bootstrap\Services\Acl;

use Bootstrap\Services\ServiceMagicMethods;

class AclContainer
{
    use ServiceMagicMethods;

    protected $allowed_roles = [];
    protected $denied_roles = [];

    public function getAllowedRoles()
    {
        return $this->allowed_roles;
    }

    public function getDeniedRoles()
    {
        return $this->denied_roles;
    }
}