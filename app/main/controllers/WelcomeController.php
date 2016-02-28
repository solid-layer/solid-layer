<?php
namespace App\Main\Controllers;

use URL;
use Lang;
use Redirect;
use FlashBag;
use Components\Model\User;

class WelcomeController extends Controller
{
    /**
     * Show the Slayer's introduction
     *
     * @return mixed
     */
    public function showSignature()
    {
        return $this->view->make('welcome');
    }

    /**
     * Redirect the user if the 'users' table will be
     * determined as empty or not
     *
     * @return mixed
     */
    public function trySampleForms()
    {
        if ( User::count() ) {

            FlashBag::notice(
                Lang::get(
                    'responses/login.pre_flash_message'
                )
            );

            return Redirect::to(URL::route('showLoginForm'));
        }

        FlashBag::warning(
            Lang::get('responses/register.pre_flash_message')
        );

        return Redirect::to(URL::route('showRegistrationForm'));
    }
}
