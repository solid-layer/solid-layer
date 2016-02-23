<?php
namespace App\Main\Controllers;

use DB;
use URL;
use Tag;
use Auth;
use View;
use Lang;
use Queue;
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
    public function initialize()
    {
        $this->middleware('csrf', [
            'only' => [
                'attemptToLogin',
            ],
        ]);
    }

    public function showRegistrationForm()
    {
        if ( Session::has('input') ) {

            $input = Session::get('input');
            Session::remove('input');

            Tag::setDefault('email', $input['email']);
        }

        return View::make('auth.showRegistrationForm');
    }

    public function storeRegistrationForm()
    {
        $inputs = $this->request->get();
        $validator = new RegistrationValidator;
        $error_messages = '';

        $messages = $validator->validate($inputs);

        if ( count($messages) ) {

            Session::set('input', $this->request->get());

            foreach ($messages as $m) {
                $error_messages .= '<li>'.$m->getMessage().'</li>';
            }
        }

        if ( $inputs['password'] !== $inputs['repassword'] ) {
            $error_messages .=
                '<li>Password and Repeat mismatch</li>';
        }

        if ( strlen($error_messages) != 0 ) {
            $error_messages = sprintf('
                Please check the error below:<br>
                    <ul>%s</ul>',
                $error_messages
            );

            FlashBag::error($error_messages);

            return Redirect::to(URL::previous());
        }

        $token = sha1(uniqid().md5(
                str_random() .
                date('Ymdhis') .
                uniqid()
            )
        );

        try {
            DB::begin();

            $user = new User;
            $success = $user->create([
                'email'    => $inputs['email'],
                'password' => Security::hash($inputs['password']),
                'token'    => $token,
            ]);

            if ($success === false) {
                throw new Exception('Cant create an account!');
            }

            $url = URL::route('activateUser', [
                'token' => $token,
            ]);

            Queue::put([
                'class' => 'Components\Queue\Email@registeredSender',
                'data'  => [
                    'template' => 'emails.registered-inligned',
                    'to'       => $inputs['email'],
                    'url'      => $url,
                    'subject'  => 'You are now registered, activation is required.'
                ],
            ]);

            DB::commit();
        } catch (TransactionFailed $e) {
            DB::rollback();

            throw $e;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }


        # Alternative is to store it using flash bag
        // FlashBag::success(
        //     Lang::get('responses/register.creation_success')
        // );

        return Redirect::to(URL::route('showLoginForm'))
            ->withSuccess(Lang::get('responses/register.creation_success'));
    }


    public function showLoginForm()
    {
        return View::make('auth.showLoginForm');
    }


    public function attemptToLogin()
    {
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

        return Redirect::to(URL::previous())
            ->withError(Lang::get('responses/login.no_user'));
    }


    public function logout()
    {
        Auth::destroy();

        return Redirect::to(

            URL::route('showLoginForm')
        );
    }


    public function activateUser($token)
    {
        $user = User::find([
            'token = :token: AND activated = :activated:',
            'bind' => [
                'token'     => $token,
                'activated' => false,
            ],
        ])->getFirst();

        if (! $user) {
            FlashBag::warning(
                'We cant find your request, please ' .
                'try again, or contact us.'
            );

            return View::make('errors.404');
        }

        $user->setActivated(true);

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

        return Redirect::to(URL::route('showLoginForm'));
    }
}
