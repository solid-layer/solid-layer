<?php
namespace App\Main\Controllers;

class NewsfeedController extends Controller
{
    public function initialize()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return $this->view->make('newsfeed.showLandingPage');
    }
}
