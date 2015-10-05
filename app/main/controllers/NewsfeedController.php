<?php

namespace App\Main\Controllers;

# using alias
use Request; # use Bootstrap\Facades\Request;
use View;    # use Bootstrap\Facades\View;

class NewsfeedController extends Controller
{
    public function initialize()
    {
        $this->acl('auth');
    }

    public function indexAction()
    {
        return View::make('newsfeed.showLandingPage');
    }
}