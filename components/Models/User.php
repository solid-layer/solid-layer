<?php

namespace Components\Models;

use Components\Models\Traits\Timestampable;
use Components\Models\Traits\SoftDeletable;

class User extends Model
{
    use Timestampable;
    use SoftDeletable;

    public $email;
    public $password;
    public $token;
    protected $name;
    protected $is_activated;

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
     * Set the name field
     *
     * @param string $name setting the name of the user
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;

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
        $this->is_activated = (int) $bool;

        return $this;
    }
}