<?php

namespace Bootstrap\Support\DB;

use Faker\Factory as FakerFactory;

class Factory
{
    public function define($class, $callback)
    {
        $data = call_user_func($callback, FakerFactory::create());

        $instance = new $class;
        $instance->create($data);

        return true;
    }
}