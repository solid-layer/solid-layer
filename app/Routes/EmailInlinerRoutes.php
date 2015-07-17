<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class EmailInlinerRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'module' => 'inliner',
            'controller' => 'EmailInliner',
        ]);

        # All the routes start with /auth
        $this->setPrefix('/auth');

        $this->add('/activation/{token}', [
            'action' => 'activateUser',
        ])->setName('activateUser');
    }
}