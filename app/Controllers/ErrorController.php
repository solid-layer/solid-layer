<?php

namespace App\Controllers;

use View;

class ErrorController Extends Controller
{
    public function whoopsAction()
    {
        return View::make('error.whoops');
    }
}