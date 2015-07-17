<?php

namespace App\Controllers;

# using alias
use View; # use Bootstrap\Facades\View;

class WelcomeController extends Controller
{
    public function showSignatureAction()
    {
        return View::make('welcome');
    }
}