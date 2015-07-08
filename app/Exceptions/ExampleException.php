<?php

namespace App\Exceptions;

use Whoops\Handler\PrettyPageHandler;
use Bootstrap\Exceptions\SlayerException;

class ExampleException extends SlayerException
{
    public function handle()
    {
        $handler = new PrettyPageHandler();

        $handler->addDataTable('Ice-cream I like', array(
            'Chocolate' => 'yes',
            'Coffee & chocolate' => 'a lot',
            'Strawberry & chocolate' => 'it\'s alright',
            'Vanilla' => 'ew',
        ));

        return $handler;
    }
}