<?php

namespace App\Acl;

use Bootstrap\Services\Acl\AclContainer;
use Bootstrap\Facades\Response;
use Bootstrap\Facades\Auth;
use Bootstrap\Facades\URL;

class AuthRestriction extends AclContainer
{
    public function load()
    {
        if (Auth::check() == false) {
            Response::redirect(
                URL::get([
                    'for' => 'show_auth',
                ])
            );
        }
    }
}