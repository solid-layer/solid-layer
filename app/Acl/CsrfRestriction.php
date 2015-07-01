<?php

namespace App\Acl;

use Bootstrap\Services\Acl\AclContainer;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Security;
use Bootstrap\Exceptions\AccessNotAllowedException;

class CsrfRestriction extends AclContainer
{
    public function load()
    {
        if (Request::isPost()) {
            if (Security::checkToken() == false) {
                // or redirect the user . . .
                throw new AccessNotAllowedException('What are you doing?');
            }
        }
    }
}