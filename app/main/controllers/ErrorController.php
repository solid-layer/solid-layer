<?php
namespace App\Main\Controllers;

use View;

class ErrorController extends Controller
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
