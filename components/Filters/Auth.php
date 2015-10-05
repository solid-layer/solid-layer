<?php

namespace Components\Filters;

use Bootstrap\Facades\FlashBag;
use Bootstrap\Facades\Redirect;
use Bootstrap\Facades\Auth as FacadeAuth;
use Bootstrap\Facades\URL;

class Auth extends BaseFilter
{
    public function load()
    {
        if (FacadeAuth::check() == false) {

            FlashBag::error('Please login to access this page.');

            Redirect::to(
                URL::get(
                    URL::route('showLoginForm'),
                    ['ref' => URL::current()]
                )
            );
        }
    }
}