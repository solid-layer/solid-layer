<?php
namespace Bootstrap\Providers;

use Symfony\Component\Console\Application;
use Bootstrap\Services\Service\ServiceProvider;

class Console extends ServiceProvider
{
    protected $_alias = 'console';

    private $version = 'v0.0.1';
    private $description = '[Slayer] brood (c) Daison Carino';
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