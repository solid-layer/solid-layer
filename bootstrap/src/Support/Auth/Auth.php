<?php

namespace Bootstrap\Support\Auth;

use Bootstrap\Facades\Session;
use Bootstrap\Facades\Security;
use Bootstrap\Facades\Response;

class Auth
{
    public function attempt($records, $remember = false)
    {
        $password_field = config()->app->auth->password_field;
        if (isset($records[$password_field]) == false) {
            throw new Exception('Password field not found!');
        }

        # get the password information
        $password = $records[$password_field];
        unset($records[$password_field]);

        # build the conditions
        $conditions = [];
        foreach ($records as $key => $record) {
            $conditions[] = "{$key} = :{$key}:";
        }

        # find the informations provided in the $records
        $auth_model = config()->app->auth->model;
        $records = $auth_model::find(
                [
                    $conditions,
                    'bind' => $records
                ]
            )
            ->getFirst();


        if ( ! $records) {
            return false;
        }


        if (Security::checkHash($password, $records->{$password_field})) {
            Session::set('is_authenticated', true);
            Session::set('user', $records);

            return true;
        }

        # TODO: implement remember token

        return false;
    }

    public function redirectIntended()
    {
        $redirect_to = config()->app->auth->auth_redirect;

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