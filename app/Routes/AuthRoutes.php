<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class AuthRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'Auth',
        ]);


        # All the routes start with /auth
        $this->setPrefix('/auth');


        $this->add('/login', [
            'action' => 'showLoginForm'
        ])->setName('showLoginForm');


        $this->add('/attempt', [
            'action' => 'attemptToLogin'
        ])->setName('attemptToLogin');


        $this->add('/logout', [
            'action' => 'logout'
        ])->setName('logout');


        $this->add('/register', [
            'action' => 'showRegistrationForm'
        ])->setName('showRegistrationForm');


        $this->add('/register/store', [
            'action' => 'storeRegistrationForm'
        ])->setName('storeRegistrationForm');


        $this->add('/activation/{token}', [
            'action' => 'activateUser',
        ])->setName('activateUser');
    }
}