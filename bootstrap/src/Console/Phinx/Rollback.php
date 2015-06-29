<?php

namespace Bootstrap\Console\Phinx;

class Rollback extends \Phinx\Console\Command\Rollback
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:rollback');
    }
}