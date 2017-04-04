<?php

namespace App\Main\Routes;

class NewsfeedRoutes extends RouteGroup
{
    public function initialize()
    {
        $this->setPrefix('/newsfeed');

        $this->setPaths([
            'controller' => 'Newsfeed',
        ]);

        $this->addGet('', [
            'action' => 'index',
        ]);
    }
}
