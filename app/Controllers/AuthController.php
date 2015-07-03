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
        Flash::warning($this->lang->get('responses/register.pre_flash_message'));
    }

    public function storeRegistrationFormAction()
    {
        Mail::send('emails.sample', [], function($mail) {
            $mail->subject('Testing App');
            $mail->to(['daison12006013@gmail.com']);
        });
    }

    public function showLoginFormAction()
    {
        Flash::notice($this->lang->get('responses/login.pre_flash_message'));

        return View::make('auth.showLoginForm');
    }

    public function attemptToLoginAction()
    {
        if ( Auth::attempt(Request::get()) ) {
            return Auth::redirectIntended();
        }

        Flash::error($this->lang->get('responses/login.no_user'));

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