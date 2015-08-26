<?php

namespace App\Slayer\Routes;

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