<?php
namespace Bootstrap\Providers;

use MongoClient;

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
