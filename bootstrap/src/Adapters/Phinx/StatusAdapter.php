<?php

namespace Bootstrap\Adapters\Phinx;

class StatusAdapter extends \Phinx\Console\Command\Status
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:status');
    }
}