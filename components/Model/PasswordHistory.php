<?php

namespace Components\Model;

use Components\Model\Traits\Timestampable;
use Components\Model\Traits\SoftDeletable;

class PasswordHistory extends Model
{
    use Timestampable;
    use SoftDeletable;

    /**
     * By every request, phalcon will always pull this function
     * as basis to know what is the table's name.
     *
     * @return string
     */
    public function getSource()
    {
        return 'password_history';
    }
}
