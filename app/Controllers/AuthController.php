<?php

namespace App\Controllers;

use Bootstrap\Facades\URL;
use Bootstrap\Facades\Auth;
use Bootstrap\Facades\View;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Redirect;
use Bootstrap\Facades\Flash;
use Bootstrap\Exceptions\AccessNotAllowedException;

class AuthController extends Controller
{
    public function initialize()
    {
        $this->acl('csrf', [
            'only' => [
                'attempt',
            ],
            'except' => [
                'show',
                'view',
                'logout',
            ],
        ]);
    }

    public function showAction()
    {
        Flash::notice('
            <h4>Nice!</h4>
            <p>Let\'s try this simple login form.</p>
        ');

        return View::make('auth.show');
    }

    public function attemptAction()
    {
        if ( Auth::attempt(Request::get()) ) {
            return Auth::redirectIntended();
        }

        Flash::error('Username or password not found!');

        return Redirect::previous();
    }

    public function logoutAction()
    {
        Auth::destroy();

        return Redirect::to(
            URL::get([
                'for' => 'show_auth'
            ])
        );
    }
}