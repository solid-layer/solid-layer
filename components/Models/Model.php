<?php

namespace Components\Models;

use Phalcon\Mvc\Model as BaseModel;
use Phalcon\Mvc\Model\Transaction\Manager as TransactionManager;

class Model extends BaseModel
{
    private $__transaction;

    public function beginTransaction()
    {
        $this->__transaction = (new TransactionManager)->get();
        $this->setTransaction($this->__transaction);

        return $this;
    }

    public function commit()
    {
        return $this->__transaction->commit();
    }
}