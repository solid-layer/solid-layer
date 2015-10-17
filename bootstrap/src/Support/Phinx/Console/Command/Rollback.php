<?php
namespace Bootstrap\Support\Phinx\Console\Command;

class Rollback extends \Phinx\Console\Command\Rollback
{
    protected function configure()
    {
        parent::configure();

        $this->setName('db:rollback');
    }
}