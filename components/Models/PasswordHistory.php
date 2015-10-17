<?php
namespace Components\Models;

use Components\Models\Traits\Timestampable;
use Components\Models\Traits\SoftDeletable;

class PasswordHistory extends Model
{
    use Timestampable;
    use SoftDeletable;

    public function getSource()
    {
        return 'password_history';
    }
}