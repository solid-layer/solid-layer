<?php

namespace Components\Filters;

use Bootstrap\Exceptions\AccessNotAllowedException;
use Components\Facades\Slayer\ACL;
use Components\Facades\Slayer\Route;

class Access extends BaseFilter
{
    protected $_allowed_roles = [
        'administrator',
    ];

    protected $_denied_roles = [
        'user',
    ];

    public function load()
    {
        # change 'guests' to your user roles

        if (ACL::isAllowed('user', Route::getControllerName(),
                Route::getActionName()) == false
        ) {
            throw new AccessNotAllowedException(
                'You are not allowed to access this page'
            );
        }
    }
}