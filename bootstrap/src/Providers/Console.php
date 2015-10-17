<?php
namespace Bootstrap\Providers;

use Symfony\Component\Console\Application;
use Bootstrap\Services\Service\ServiceProvider;

class Console extends ServiceProvider
{
    private   $version     = 'v0.0.1';
    private   $description = '[Slayer] brood (c) Daison Carino';
    private   $application = null;
    protected $alias       = 'console';

    public function register()
    {
        $app = new Application($this->description, $this->version);

        foreach (config()->consoles as $console) {
            $app->add(new $console);
        }

        return $app;
    }
}