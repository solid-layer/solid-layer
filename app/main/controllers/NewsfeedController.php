<?php
namespace App\Main\Controllers;

use View;

class NewsfeedController extends Controller
{
    public function initialize()
    {
        $this->middleware('auth');
    }

    public function indexAction()
    {
        return View::make('newsfeed.showLandingPage');
    }
}