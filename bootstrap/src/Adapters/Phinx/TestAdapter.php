<?php

namespace Bootstrap\Adapters\Phinx;

class TestAdapter extends \Phinx\Console\Command\Test
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:test');
    }
}