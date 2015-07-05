<?php

namespace App\Controllers;

use Bootstrap\Facades\URL;
use Bootstrap\Facades\Auth;
use Bootstrap\Facades\View;
use Bootstrap\Facades\Request;
use Bootstrap\Facades\Redirect;
use Bootstrap\Facades\Flash;
use Bootstrap\Facades\Mail;
use Bootstrap\Facades\Lang;
use Bootstrap\Facades\Session;
use Bootstrap\Facades\Tag;
use Bootstrap\Facades\Security;
use Bootstrap\Exceptions\AccessNotAllowedException;
use App\Validation\RegistrationValidator;
use App\Models\User;

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
        # just the info message
        Flash::warning(Lang::get('responses/register.pre_flash_message'));


        # by default there is no session[input] found
        # or else we need to persists the form by
        # assigning a default value
        # alternative call:
        #   $this->session->has(...)
        if (Session::has('input')) {

            # alternative call:
            #   $this->session->get(...)
            $input = Session::get('input');

            # alternative call:
            #   $this->tag->setDefault(..., <value)
            Tag::setDefault('email', $input['email']);
            Tag::setDefault('username', $input['username']);

            # alternative call:
            #   $this->session->remove(...)
            Session::remove('input');
        }


        # by default, phalcon is smart enough to get
        # 'auth.showRegistrationForm' as 
        # '<controller>.<action>'
        # alternative call:
        #   $this->view->make(...)
        // return View::make('auth.showRegistrationForm');
    }

    public function storeRegistrationFormAction()
    {
        $validator = new RegistrationValidator;

        $inputs = $this->request->get();

        # let's validate the requests
        $messages = $validator->validate($inputs);

        $error_messages = '';

        # if a message found, then let's process the redirection
        if (count($messages)) {

            # let's store the request to session[input]
            # for persistence
            # alternative call:
            #   $this->session->set(...)
            Session::set('input', $this->request->get());


            # if there is an error, let's map all the erros into one message
            foreach ($messages as $m) {
                $error_messages .= '<li>' . $m->getMessage() . '</li>';
            }
        }

        # validate password and repeat password mismatch
        if ($inputs['password'] != $inputs['repassword']) {
            $error_messages .= '<li>Password and Repeat mismatch</li>';
        }

        if (strlen($error_messages) != 0) {
            $error_messages = sprintf('
                Please check the error below:<br>
                    <ul>%s</ul>', 
                    $error_messages
            );


            # flash the error message
            # alternative call:
            #   $this->flash->error(...)
            Flash::error($error_messages);


            # redirect the user from the previous requests
            # alternative call:
            #   $this->request->previous()
            return Redirect::previous();
        }


        # generate a token 
        $token = sha1(uniqid() . md5('123qwe' . date('Ymdhis') . uniqid()));

        $user = new User;
        $user->create([
            'email' => $inputs['email'],
            'username' => $inputs['username'],
            'password' => Security::hash($inputs['password']),
            'token' => $token,
        ]);
        # alternative creation:
        //  $user->email = $inputs['email'];
        //  $user->username = $inputs['username'];
        //  $user->password = Security::hash($inputs['password']);
        //  $user->token = $token;
        //  $user->create();


        # generate a full path url providing the token
        # alternative call:
        #   $this->url->get(...)
        $url = URL::get([
            'for' => 'activateUser',
            'token' => $token,
        ]);


        # alternative call:
        #   $this->mail->send(..., [...], function() {})
        Mail::send('emails.registered', ['url' => $url], function($mail) use ($inputs) {
            $mail->subject('You have successfully registered.');
            $mail->to([$inputs['email']]);
        });


        # flash success
        # alternative call:
        #   $this->flash->success(...)
        Flash::success(Lang::get('responses/register.creation_success'));


        # alternative call:
        #   $this->redirect->to(...)
        return Redirect::to(URL::get(['for' => 'showLoginForm']));
    }

    public function showLoginFormAction()
    {
        # just the info message
        # alternative call:
        #   $this->flash->notice(...)
        Flash::notice(

            # alternative call:
            #   $this->lang->get(...)
            Lang::get(
                'responses/login.pre_flash_message'   
            )
        );

        # by default, phalcon is smart enough to use
        # to get the 'auth.showLoginForm' as '<controller>.<action>' 
        # alternative call:
        #   $this->view->make(...)
        // return View::make('auth.showLoginForm');
    }

    public function attemptToLoginAction()
    {
        # alternative call:
        #   $this->auth->attempt(...)
        if ( Auth::attempt(Request::get()) ) {

            # alternative call:
            #   $this->auth->redirectIntended(...)
            return Auth::redirectIntended();
        }


        # alternative call:
        #   $this->redirect->error()
        Flash::error(
            Lang::get('responses/login.no_user')
        );


        # alternative call
        #   $this->redirect->previous();
        return Redirect::previous();
    }

    public function logoutAction()
    {
        # now let's destroy our auth
        # alternative call:
        #   $this->auth->destroy()
        Auth::destroy();

        # then redirect the user
        # alternative call:
        #   $this->redirect->to([...])
        return Redirect::to(

            # alternative call:
            #   $this->url->get([...])
            URL::get([
                'for' => 'show_auth'
            ])
        );
    }
}