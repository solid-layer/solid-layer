<?php

namespace Bootstrap\Support\Phinx;

class Test extends \Phinx\Console\Command\Test
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:test');
    }
}