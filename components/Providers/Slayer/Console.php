<?php

namespace Components\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Symfony\Component\Console\Application;

// use Symfony\Component\Console\Input\InputInterface;
// use Symfony\Component\Console\Output\OutputInterface;

class Console extends ServiceProvider
{
    protected $_alias = 'console';

    private $version = 'v0.0.1';
    private $description = 'Slayer (c) Daison Carino';
    private $application = null;

    public function register()
    {
        $app = new Application($this->description, $this->version);

        foreach (config()->consoles as $console) {
            $app->add(new $console);
        }

        return $app;
    }
}