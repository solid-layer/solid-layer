<?php
namespace Components\Model;

use Components\Model\Traits\Timestampable;
use Components\Model\Traits\SoftDeletable;

class PasswordHistory extends Model
{
    use Timestampable;
    use SoftDeletable;

    public function getSource()
    {
        return 'password_history';
    }
}
