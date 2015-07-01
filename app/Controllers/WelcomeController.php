<?php

namespace App\Controllers;

use App\Exceptions\ExampleException;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Filter;
use Bootstrap\Facades\Route;
use Bootstrap\Facades\View;
use Bootstrap\Facades\ACL;

class WelcomeController extends Controller
{
    public function showSignatureAction()
    {
        return View::make('welcome.showSignature');
    }
}