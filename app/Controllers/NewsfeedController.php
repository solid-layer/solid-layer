<?php

namespace App\Controllers;

use Bootstrap\Facades\Request;
use Bootstrap\Facades\View;

class NewsfeedController extends Controller
{
    public function initialize()
    {
        $this->acl('auth');
    }

    public function indexAction()
    {

    }
}