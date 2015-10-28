<?php
namespace Components\Providers\Slayer;

use MongoClient;
use Bootstrap\Services\Service\ServiceProvider;

class Mongo extends ServiceProvider
{
    protected $alias  = 'mongo';
    protected $shared = false;

    public function register()
    {
        $config = config()->database->mongo;

        if ( ! $config->enabled ) {
            return $this;
        }

        $mongo = new MongoClient($config->host);

        return $mongo->selectDB($config->dbname);
    }
}