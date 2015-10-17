<?php
namespace Components\Filters;

use Components\Facades\Slayer\URL;
use Components\Facades\Slayer\FlashBag;
use Components\Facades\Slayer\Redirect;
use Components\Facades\Slayer\Auth as FacadeAuth;

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