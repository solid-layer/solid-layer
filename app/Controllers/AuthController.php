<?php

namespace App\Controllers;

# using alias
use URL;        // use Bootstrap\Facades\URL;
use Auth;       // use Bootstrap\Facades\Auth;
use View;       // use Bootstrap\Facades\View;
use Request;    // use Bootstrap\Facades\Request;
use Redirect;   // use Bootstrap\Facades\Redirect;
use Flash;      // use Bootstrap\Facades\Flash;
use Mail;       // use Bootstrap\Facades\Mail;
use Lang;       // use Bootstrap\Facades\Lang;
use Session;    // use Bootstrap\Facades\Session;
use Tag;        // use Bootstrap\Facades\Tag;
use Security;   // use Bootstrap\Facades\Security;
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
            return Redirect::to(URL::previous());
        }


        # generate a token 
        $token = sha1(uniqid() . md5(str_random() . date('Ymdhis') . uniqid()));

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
        $url = URL::route('activateUser', [
            'token' => $token,
        ]);


        # alternative call:
        #   $this->mail->send(..., [...], function() {})
        Mail::send('emails.registered', ['url' => $url], function($mail) use ($inputs) {
            $mail->to([$inputs['email']]);
            $mail->subject('You have successfully registered.');
        });


        # flash success
        # alternative call:
        #   $this->flash->success(...)
        Flash::success(Lang::get('responses/register.creation_success'));


        # alternative call:
        #   $this->redirect->to(...)
        return Redirect::to(URL::route('showLoginForm'));
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

        # by default, phalcon is smart enough
        # to get the 'auth.showLoginForm' as '<controller>.<action>' 
        # alternative call:
        #   $this->view->make(...)
        // return View::make('auth.showLoginForm');
    }


    public function attemptToLoginAction()
    {
        $credentials = [
            'username' => Request::get('username'),
            'password' => Request::get('password'),
            'is_activated' => 1,
        ];

        # alternative call:
        #   $this->auth->attempt(...)
        if ( Auth::attempt($credentials) ) {

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
        return Redirect::to(URL::previous());
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
            URL::route('showLoginForm')
        );
    }


    public function activateUserAction($token)
    {
        $conditions = 'token = :token: AND is_activated = :isActivated:';

        $params = [
            'token' => $token,
            'isActivated' => false,
        ];

        $user = User::find([
            $conditions,
            'bind' => $params,
        ])->getFirst();


        # return 404, if the condition not found
        if (! $user) {
            Flash::warning('We cant find your request, please try again, or contact us.');

            return View::make('error.show404');
        }


        # activate the user
        $user->setIsActivated(true);


        # if user fails to save, show an error
        if ($user->save() == false) {

            foreach ($user->getMessages() as $message) {

                Flash::error($message);
            }
        } else {
            Flash::success('You have successfully activated your account, you are now allowed to login.');
        }


        # then redirect the user with the success message
        return Redirect::to(URL::route('showLoginForm'));
    }
}