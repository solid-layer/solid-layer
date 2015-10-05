<?php

namespace App\Main\Controllers;

use URL;            # use Bootstrap\Facades\URL;
use Auth;           # use Bootstrap\Facades\Auth;
use View;           # use Bootstrap\Facades\View;
use Request;        # use Bootstrap\Facades\Request;
use Redirect;       # use Bootstrap\Facades\Redirect;
use FlashBag;       # use Bootstrap\Facades\FlashBag;
use Mail;           # use Bootstrap\Facades\Mail;
use Lang;           # use Bootstrap\Facades\Lang;
use Session;        # use Bootstrap\Facades\Session;
use Tag;            # use Bootstrap\Facades\Tag;
use Security;       # use Bootstrap\Facades\Security;
use Components\Validation\RegistrationValidator;
use Components\Models\User;
use Phalcon\Mvc\Model\Transaction\Failed as TransactionFailed;

class AuthController extends Controller
{
    public function initialize()
    {
        $this->acl('csrf', [
            'only'   => [
                'attemptToLogin',
            ],
            'except' => [
                'showRegistrationForm',
                'storeRegistrationForm',
                'showLoginForm',
                'view',
                'logout',
                'activateUser',
            ],
        ]);
    }


    public function showRegistrationFormAction()
    {
        # - just the info message

        FlashBag::warning(
            Lang::get('responses/register.pre_flash_message')
        );


        # - by default there is no session[input] found
        # or else we need to persists the form by
        # assigning a default value
        #
        # - alternative call:
        #   $this->session->has( ... )

        if (Session::has('input')) {

            # - alternative call:
            #   $this->session->get( ... )

            $input = Session::get('input');

            # - alternative call:
            #   $this->tag->setDefault(..., <value)

            Tag::setDefault('email', $input[ 'email' ]);

            # - alternative call:
            #   $this->session->remove( ... )

            Session::remove('input');
        }


        # - by default, phalcon is smart enough to get
        # 'auth.showRegistrationForm' as
        # '<controller>.<action>'
        #
        # - alternative call:
        #   $this->view->make( ... )

        // return View::make('auth.showRegistrationForm');
    }


    public function storeRegistrationFormAction()
    {
        $validator = new RegistrationValidator;

        $inputs = $this->request->get();

        # - let's validate the requests

        $messages = $validator->validate($inputs);

        $error_messages = '';

        # - if a message found, then let's process the redirection

        if (count($messages)) {

            # - let's store the request to session[input]
            # for persistence
            #
            # - alternative call:
            #   $this->session->set( ... )

            Session::set('input', $this->request->get());


            # - if there is an error, let's map all the errors
            # into one message

            foreach ($messages as $m) {
                $error_messages .=
                    '<li>' . $m->getMessage() . '</li>';
            }
        }

        # - validate password and repeat password mismatch

        if ($inputs[ 'password' ] != $inputs[ 'repassword' ]) {
            $error_messages .=
                '<li>Password and Repeat mismatch</li>';
        }

        if (strlen($error_messages) != 0) {
            $error_messages = sprintf('
                Please check the error below:<br>
                    <ul>%s</ul>',
                $error_messages
            );


            # - flash the error message
            #
            # - alternative call:
            #   $this->flash->error( ... )

            FlashBag::error($error_messages);


            # - redirect the user from the previous requests
            #
            # - alternative call:
            #   $this->request->previous()

            return Redirect::to(URL::previous());
        }


        # - generate some customized random token

        $token = sha1(uniqid() . md5(
                str_random() .
                date('Ymdhis') .
                uniqid()
            )
        );


        try {

            # - alternative way to create a new record

            // $user->email = $inputs['email'];
            // $user->password = Security::hash($inputs['password']);
            // $user->token = $token;
            // $user->create();

            $user = new User;
            $user->beginTransaction();
            $success = $user->create([
                'email'    => $inputs[ 'email' ],
                'password' => Security::hash($inputs[ 'password' ]),
                'token'    => $token,
            ]);

            if ($success == false) {
                throw new \Exception('Cant create an account!');
            }


            # - generate a full path url providing the token
            #
            # - alternative call:
            #   $this->url->get( ... )

            $url = URL::route('activateUser', [
                'token' => $token,
            ]);


            # - alternative call:
            #   $this->mail->send( ... , [ ... ], function(){ ... })

            Mail::send('emails.registered-inligned', ['url' => $url],
                function ($mail) use ($inputs) {

                    $mail->to([
                        $inputs['email'],
                    ]);

                    $mail->subject(
                        'You are now registered successfully.'
                    );
                }
            );

            $user->commit();

        } catch (TransactionFailed $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }


        # - flash success
        #
        # - alternative call:
        #   $this->flash->success( ... )

        // FlashBag::success(
        //     Lang::get('responses/register.creation_success')
        // );


        # - alternative call:
        #   $this->redirect->to( ... )

        return Redirect::to(URL::route('showLoginForm'))
            ->withSuccess(Lang::get('responses/register.creation_success'));
    }


    public function showLoginFormAction()
    {
        # - just the info message
        #
        # - alternative call:
        #   $this->flash->notice( ... )

        FlashBag::notice(

            # - alternative call:
            #   $this->lang->get( ... )

            Lang::get(
                'responses/login.pre_flash_message'
            )
        );

        # - by default, Phalcon is smart enough to get the
        # 'auth.showLoginForm' as '<controller>.<action>'
        #
        # - alternative call:
        #   $this->view->make( ... )

        // return View::make('auth.showLoginForm');
    }


    public function attemptToLoginAction()
    {
        $credentials = [
            'email'        => Request::get('email'),
            'password'     => Request::get('password'),
            'is_activated' => true,
        ];

        # - alternative call:
        #   $this->auth->attempt( ... )

        if (Auth::attempt($credentials)) {

            if (Request::has('ref') && strlen(Request::get('ref')) != 0) {
                return Redirect::to(Request::get('ref'));
            }

            # - alternative call:
            #   $this->auth->redirectIntended( ... )

            return Auth::redirectIntended();
        }


        # - alternative call:
        #   $this->redirect->error()

        // FlashBag::error(
        //     Lang::get('responses/login.no_user')
        // );

        return Redirect::to(URL::previous())
            ->withError(Lang::get('responses/login.no_user'));
    }


    public function logoutAction()
    {
        # - now let's destroy our auth
        #
        # - alternative call:
        #   $this->auth->destroy()

        Auth::destroy();

        # - then redirect the user
        #
        # - alternative call:
        #   $this->redirect->to([...])

        return Redirect::to(

            # - alternative call:
            #   $this->url->get([...])

            URL::route('showLoginForm')
        );
    }


    public function activateUserAction($token)
    {
        $user = User::find([
            'token = :token: AND is_activated = :is_activated:',
            'bind' => [
                'token'        => $token,
                'is_activated' => false,
            ],
        ])->getFirst();


        # - return 404, if the condition not found

        if (!$user) {
            FlashBag::warning(
                'We cant find your request, please ' .
                'try again, or contact us.'
            );

            return View::make('errors.404');
        }


        # - activate the user

        $user->setIsActivated(true);


        # - if user fails to save, show an error

        if ($user->save() == false) {

            foreach ($user->getMessages() as $message) {

                FlashBag::error($message);
            }
        } else {

            FlashBag::success(
                'You have successfully activated your account, ' .
                'you are now allowed to login.'
            );
        }

        # - then redirect the user with the success message

        return Redirect::to(URL::route('showLoginForm'));
    }
}