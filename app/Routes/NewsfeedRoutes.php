<?php

namespace App\Routes;

use Phalcon\Mvc\Router\Group as RouterGroup;

class NewsfeedRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'Newsfeed',
        ]);

        $this->setPrefix('/newsfeed');

        $this->add('', [
            'action' => 'index',
        ]);
    }
}