<?php
namespace App\Main\Controllers;

use View;

class WelcomeController extends Controller
{
    public function initialize()
    {
        $this->middleware('acl');
    }

    public function showSignatureAction()
    {
        return View::make('welcome');
    }
}