<?php

namespace App\Main\Routes;

class NewsfeedRoutes extends RouteGroup
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