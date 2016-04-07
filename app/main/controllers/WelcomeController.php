<?php
namespace App\Main\Controllers;

use Components\Model\User;

class WelcomeController extends Controller
{
    /**
     * GET | This shows the slayer's introduction
     *
     * @return mixed
     */
    public function showSignature()
    {
        return view('welcome');
    }

    /**
     * GET | Redirect the user if the 'users' table is empty or not
     * then redirect it to either login or registration
     *
     * @return mixed
     */
    public function trySampleForms()
    {
        if ( User::count() ) {

            flash_bag()->notice(
                lang()->get(
                    'responses/login.pre_flash_message'
                )
            );

            return redirect()->to(route('showLoginForm'));
        }

        flash_bag()->warning(
            lang()->get('responses/register.pre_flash_message')
        );

        return redirect()->to(route('showRegistrationForm'));
    }
}
