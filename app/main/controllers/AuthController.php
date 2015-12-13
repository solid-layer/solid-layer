<?php
namespace App\Main\Controllers;

use DB;
use URL;
use Tag;
use Auth;
use View;
use Mail;
use Lang;
use Session;
use Request;
use Redirect;
use FlashBag;
use Security;
use Exception;
use Components\Model\User;
use Components\Validation\RegistrationValidator;
use Phalcon\Mvc\Model\Transaction\Failed as TransactionFailed;

class AuthController extends Controller
{
    public function showRegistrationFormAction()
    {
        # - just the info message

        FlashBag::warning(
            Lang::get('responses/register.pre_flash_message')
        );


        # - by default there is no session[input] found
        # or else we need to persists the form by
        # assigning a default value

        if (Session::has('input')) {
            $input = Session::get('input');

            Tag::setDefault('email', $input[ 'email' ]);

            Session::remove('input');
        }


        # - by default, phalcon is smart enough to get
        # 'auth.showRegistrationForm' as
        # '<controller>.<action>'

        return View::make('auth.showRegistrationForm');
    }


    public function storeRegistrationFormAction()
    {
        $error_messages = '';
        $inputs         = $this->request->get();
        $validator      = new RegistrationValidator;

        # - let's validate the requests

        $messages = $validator->validate($inputs);


        # - if a message found, then let's process the redirection

        if (count($messages)) {

            # - let's store the request to session[input]
            # for persistence

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

            FlashBag::error($error_messages);


            # - redirect the user from the previous requests

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
            DB::begin();

            $user = new User;
            $success = $user->create([
                'email'    => $inputs[ 'email' ],
                'password' => Security::hash($inputs[ 'password' ]),
                'token'    => $token,
            ]);

            if ($success === false) {
                throw new Exception('Cant create an account!');
            }


            # - generate a full path url providing the token

            $url = URL::route('activateUser', [
                'token' => $token,
            ]);


            Mail::send('emails.registered-inligned', ['url' => $url],
                function (\Clarity\Contracts\Mail\MailInterface $mail) use ($inputs) {

                    $mail->to([
                        $inputs['email'],
                    ]);

                    $mail->subject(
                        'You are now registered successfully.'
                    );
                }
            );

            DB::commit();
        } catch (TransactionFailed $e) {
            DB::rollback();

            throw $e;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }


        # - flash success

        // FlashBag::success(
        //     Lang::get('responses/register.creation_success')
        // );

        return Redirect::to(URL::route('showLoginForm'))
            ->withSuccess(Lang::get('responses/register.creation_success'));
    }


    public function showLoginFormAction()
    {
        # - just the info message

        FlashBag::notice(

            Lang::get(
                'responses/login.pre_flash_message'
            )
        );

        # - by default, Phalcon is smart enough to get the
        # 'auth.showLoginForm' as '<controller>.<action>'

        return View::make('auth.showLoginForm');
    }


    public function attemptToLoginAction()
    {
        $this->middleware('csrf');

        $credentials = [
            'email'     => Request::get('email'),
            'password'  => Request::get('password'),
            'activated' => true,
        ];

        if (Auth::attempt($credentials)) {
            if ($redirect = Auth::redirectIntended()) {
                return $redirect;
            }

            return Redirect::to(URL::to('newsfeed'));
        }

        // FlashBag::error(
        //     Lang::get('responses/login.no_user')
        // );

        return Redirect::to(URL::previous())
            ->withError(Lang::get('responses/login.no_user'));
    }


    public function logoutAction()
    {
        # - now let's destroy our auth

        Auth::destroy();


        # - then redirect the user

        return Redirect::to(

            # - alternative call:
            #   $this->url->get([...])

            URL::route('showLoginForm')
        );
    }


    public function activateUserAction($token)
    {
        $user = User::find([
            'token = :token: AND activated = :activated:',
            'bind' => [
                'token'     => $token,
                'activated' => false,
            ],
        ])->getFirst();


        # - return 404, if the condition not found

        if (! $user) {
            FlashBag::warning(
                'We cant find your request, please ' .
                'try again, or contact us.'
            );

            return View::make('errors.404');
        }


        # - activate the user

        $user->setActivated(true);


        # - if user fails to save, show an error

        if ($user->save() === false) {
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
