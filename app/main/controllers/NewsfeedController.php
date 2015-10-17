<?php
namespace App\Main\Controllers;

use View;
use Request;

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