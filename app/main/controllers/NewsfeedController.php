<?php
namespace App\Main\Controllers;

class NewsfeedController extends Controller
{
    public function initialize()
    {
        $this->middleware('auth');
    }

    public function indexAction()
    {
        return $this->view->make('newsfeed.showLandingPage');
    }
}
