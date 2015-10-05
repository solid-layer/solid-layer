<?php

namespace Components\Filters;

use Bootstrap\Facades\Request;
use Bootstrap\Facades\Security;
use Bootstrap\Exceptions\AccessNotAllowedException;

class CSRF extends BaseFilter
{
    public function load()
    {
        if (Request::isPost()) {

            if (Security::checkToken() == false) {

                # - throw exception or redirect the user
                # or render a content using
                # View::take(<resources.view>);exit;

                throw new AccessNotAllowedException('What are you doing?');
            }
        }
    }
}