<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class User extends Model
{
    # ---- The table columns
    public $email;

    public $username;

    public $password;

    public $token;

    protected $first_name;

    protected $last_name;

    protected $is_activated;


    public function initialize()
    {
        # ---- created_at and updated_at are not nullable
        # so we should skip these fields upon creating
        # a new record
        $this->skipAttributesOnCreate([
            'created_at',
            'updated_at',
        ]);

        # ---- updated_at is not nullable
        # so we should skip this field upon updating
        # a record
        $this->skipAttributesOnUpdate([
            'updated_at',
        ]);
    }


    /**
     * By every request, phalcon will always pull this function
     * as basis to know what is the table's name
     * 
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }


    /**
     * Set the first_name field
     *
     * @param string $first_name setting the user's first name
     * @return mixed
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }


    /**
     * Set the last_name field
     *
     * @param string $last_name setting the user's last name
     * @return mixed
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }


    /**
     * Set the column is_activated in the table as boolean
     *
     * @param boolean $bool a boolean value to be based if activated or not
     * @return mixed
     */
    public function setIsActivated($bool)
    {
        $this->is_activated = $bool ? 1 : 0;

        return $this;
    }
}