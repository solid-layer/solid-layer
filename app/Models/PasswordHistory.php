<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class PasswordHistory extends Model
{
    public function getSource()
    {
        return 'password_history';
    }
}