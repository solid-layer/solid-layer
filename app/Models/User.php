<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class User extends Model
{
    public $email;
    public $username;
    public $password;
    public $token;
    protected $first_name;
    protected $last_name;
    protected $is_activated;

    public function initialize()
    {
        # make everything work,
        # our system doesn't require us to
        # insert first_name and last_name, so
        # we should skip these fields on create
        $this->skipAttributesOnCreate([
            'created_at',
            'updated_at',
        ]);

        # let mysql update this field
        # based on the migration we did
        $this->skipAttributesOnUpdate([
            'updated_at',
        ]);
    }

    public function getSource()
    {
        return 'users';
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function setIsActivated($bool)
    {
        $this->is_activated = $bool ? 1 : 0;

        return $this;
    }
}