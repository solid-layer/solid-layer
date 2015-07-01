<?php

namespace Bootstrap\Support\Phinx;

class Status extends \Phinx\Console\Command\Status
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:status');
    }
}