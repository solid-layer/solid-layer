<?php

namespace App\Controllers;

use App\Exceptions\ExampleException;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Filter;
use Bootstrap\Facades\Route;
use Bootstrap\Facades\View;

class WelcomeController extends Controller
{
  public function showSignatureAction()
  {
    # throw new ExampleException('wew');
    // dd(Route::getControllerName());

    # the results below should be the same
    $email = Filter::sanitize(Request::get('email'), 'int');
    $r_email = Request::get('email', 'int');

    # 
 
    # disable the view
    // View::disable();

    return View::make('welcome.showSignature');
  }
}