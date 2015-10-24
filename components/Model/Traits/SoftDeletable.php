<?php
namespace Components\Model\Traits;

trait SoftDeletable
{
    protected $deleted_at;

    public function beforeDelete()
    {
        $this->deleted_at = date('Y-m-d H:i:s');
    }
}