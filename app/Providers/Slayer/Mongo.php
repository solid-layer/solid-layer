<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;

class Mongo extends ServiceProvider
{
    public $_alias = 'mongo';

    public $_shared = false;

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