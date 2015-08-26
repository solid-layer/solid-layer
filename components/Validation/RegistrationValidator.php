<?php

namespace Components\Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class RegistrationValidator extends Validation
{
    public function initialize()
    {
        $this->add('email', new PresenceOf([
            'message' => 'The email is required',
        ]));

        $this->add('email', new Email([
            'message' => 'The email is not valid',
        ]));
    }
}