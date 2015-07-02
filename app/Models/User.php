<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class User extends Model
{
    public function getSource()
    {
        return 'users';
    }
}