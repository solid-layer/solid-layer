<?php

namespace App\Controllers;

use App\Exceptions\ExampleException;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Filter;
use Bootstrap\Facades\Route;
use Bootstrap\Facades\View;

class WelcomeController extends Controller
{
    public function initialize()
    {
        $this->acl('default');
    }

    public function showSignatureAction()
    {
        return View::make('welcome.showSignature');
    }
}