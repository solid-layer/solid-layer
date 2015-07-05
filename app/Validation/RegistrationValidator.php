<?php

namespace App\Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class RegistrationValidator extends Validation
{
    public function initialize()
    {
        $this->add('username', new PresenceOf(array(
            'message' => 'The username is required'
        )));

        $this->add('email', new PresenceOf(array(
            'message' => 'The email is required'
        )));

        $this->add('email', new Email(array(
            'message' => 'The email is not valid'
        )));
    }
}