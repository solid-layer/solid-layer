<?php

namespace Bootstrap\Support\Auth;

use Bootstrap\Facades\Session;
use Bootstrap\Facades\Security;
use Bootstrap\Facades\Response;

class Auth
{
    public function attempt($record, $remember = false)
    {
        $password_field = slayer_config()->app->auth->password_field;
        if (isset($record[$password_field]) == false) {
            throw new Exception('Password field not found!');
        }

        # get the password information
        $password = $record[$password_field];
        unset($record[$password_field]);

        # find the informations provided in the $record
        $auth_model = slayer_config()->app->auth->model;
        $record = $auth_model::find($record)->getFirst();

        if ( ! $record) {
            return false;
        }

        if (Security::checkHash($password, $record->{$password_field})) {
            Session::set('is_authenticated', true);
            Session::set('user', $record);

            return true;
        }

        # TODO: implement remember token

        return false;
    }

    public function redirectIntended()
    {
        $redirect_to = slayer_config()->app->auth->auth_redirect;

        return Response::redirect($redirect_to);
    }

    public function check()
    {
        if (Session::has('is_authenticated')) {
            return true;
        }

        return false;
    }

    public function user()
    {
        return Session::get('user');
    }

    public function destroy()
    {
        Session::remove('is_authenticated');
        Session::remove('user');

        return true;
    }
}