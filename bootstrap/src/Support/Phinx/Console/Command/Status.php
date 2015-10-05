<?php

namespace Bootstrap\Support\Phinx\Console\Command;

class Status extends \Phinx\Console\Command\Status
{
    protected function configure()
    {
        parent::configure();

        $this->setName('db:status');
    }
}