<?php

namespace App\Acl;

use Bootstrap\Services\Acl\AclContainer;
use Bootstrap\Facades\Flash;
use Bootstrap\Facades\Redirect;
use Bootstrap\Facades\Auth as FacadeAuth;
use Bootstrap\Facades\URL;

class Auth extends AclContainer
{
    public function load()
    {
        if (FacadeAuth::check() == false) {

            Flash::error('Please login to access this page.');

            Redirect::to(
                URL::get(
                    URL::route('showLoginForm'), 
                    ['ref' => URL::current()]
                )
            );
        }
    }
}