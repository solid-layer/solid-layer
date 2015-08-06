<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use App\Models\Traits\Timestampable;
use App\Models\Traits\SoftDeletable;

class User extends Model
{
    use Timestampable;
    use SoftDeletable;

    # ---- The table columns
    public $email;
    public $username;
    public $password;
    public $token;
    protected $first_name;
    protected $last_name;
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