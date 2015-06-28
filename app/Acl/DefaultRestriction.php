<?php

namespace App\Acl;

use Bootstrap\Services\AclContainer;
use Bootstrap\Facades\Route;
use Bootstrap\Facades\ACL;
use Bootstrap\Exceptions\AccessNotAllowedException;

class DefaultRestriction extends AclContainer
{
    protected $_allowed_roles = [
        'guests',
    ];

    protected $_denied_roles = [
        'users',
    ];

    protected $_handlers = [
        'Welcome' => [
            'showSignature',
        ],
    ];

    public function load()
    {
        if (ACL::isAllowed('guests', Route::getControllerName(), Route::getActionName()) == false) {
            throw new AccessNotAllowedException("You are not allowed to access this page");
        }
    }
}