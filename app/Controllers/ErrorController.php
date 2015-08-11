<?php

namespace App\Controllers;

use View;

class ErrorController Extends Controller
{
    public function whoopsAction()
    {
        return View::make('errors.whoops');
    }

    public function pageNotFoundAction()
    {
        return View::make('errors.404');
    }
}