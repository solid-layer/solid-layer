<?php

namespace Bootstrap\Adapters\Phinx;

class RollbackAdapter extends \Phinx\Console\Command\Rollback
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:rollback');
    }
}