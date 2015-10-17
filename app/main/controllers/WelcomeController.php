<?php
namespace App\Main\Controllers;

use View;

class WelcomeController extends Controller
{
    public function showSignatureAction()
    {
        return View::make('welcome');
    }
}