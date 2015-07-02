<?php

namespace App\Controllers;

use Bootstrap\Facades\URL;
use Bootstrap\Facades\Auth;
use Bootstrap\Facades\View;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Redirect;
use Bootstrap\Facades\Flash;
use Bootstrap\Facades\Mail;
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

    public function showRegistrationFormAction()
    {
        Flash::warning('
            <h4>Great!</h4>
            <p>Now, let\'s try this registration form.</p>
        ');
    }

    public function storeRegistrationFormAction()
    {
        Mail::send('emails.sample', [], function($mail) {
            $mail->subject('Testing App');
            $mail->from('postmaster@sandboxa6c86c16840d4756826185daa128e64d.mailgun.org');
            $mail->to(['daison12006013@gmail.com']);
        });

    }

    public function showLoginFormAction()
    {
        Flash::notice('
            <h4>Nice!</h4>
            <p>Let\'s try this simple login form.</p>
        ');

        return View::make('auth.showLoginForm');
    }

    public function attemptToLoginAction()
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