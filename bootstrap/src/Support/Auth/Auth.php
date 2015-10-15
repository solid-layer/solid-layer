<?php

namespace Bootstrap\Support\Auth;

use Components\Facades\Slayer\Session;
use Components\Facades\Slayer\Security;
use Components\Facades\Slayer\Response;

class Auth
{
    /**
     *
     */
    public function attempt($records)
    {
        $password_field = config()->app->auth->password_field;
        if (isset( $records[ $password_field ] ) == false) {
            throw new Exception('Password field not found!');
        }


        # - get the password information
        $password = $records[ $password_field ];
        unset( $records[ $password_field ] );


        # - build the conditions
        $conditions = null;
        $first = true;
        foreach ($records as $key => $record) {

            if (!$first) {
                $conditions .= 'AND';
            }

            $conditions .= " {$key} = :{$key}: ";
            $first = false;
        }


        # - find the informations provided in the $records
        $auth_model = config()->app->auth->model;
        $records =
            $auth_model::find([
                $conditions,
                'bind' => $records,
            ])->getFirst();


        # - check if there is no record, then return false
        if (!$records) {
            return false;
        }


        # - now check if the password given is matched with the
        # existing password recorded.
        if (Security::checkHash($password, $records->{$password_field})) {
            Session::set('isAuthenticated', true);
            Session::set('user', $records);

            return true;
        }

        return false;
    }


    /**
     *
     */
    public function redirectIntended()
    {
        $redirect_to = config()->app->auth->auth_redirect;

        return Response::redirect($redirect_to);
    }


    /**
     *
     */
    public function check()
    {
        if (Session::has('isAuthenticated')) {
            return true;
        }

        return false;
    }


    /**
     *
     */
    public function user()
    {
        return Session::get('user');
    }


    /**
     *
     */
    public function destroy()
    {
        Session::remove('isAuthenticated');
        Session::remove('user');

        return true;
    }
}