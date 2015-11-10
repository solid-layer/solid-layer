<?php
namespace Bootstrap\Providers;

use Symfony\Component\Console\Application;

class Console extends ServiceProvider
{
    private   $version     = 'v0.0.1';
    private   $description = '[Slayer] brood (c) Daison Carino';
    protected $alias       = 'console';

    public function register()
    {
        $app = new Application($this->description, $this->version);

        if ( php_sapi_name() === 'cli' ) {
            foreach (config()->consoles as $console) {
                $app->add(new $console);
            }
        }

        return $app;
    }
}
