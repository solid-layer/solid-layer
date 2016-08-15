<?php

namespace App\Main\Routes;

class AuthRoutes extends RouteGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'Auth',
        ]);

        $this->setPrefix('/auth');

        $this->addGet('/login/:params', [
            'action' => 'showLoginForm',
            'params' => 1,
        ])->setName('showLoginForm');

        $this->addPost('/attempt', [
            'action' => 'attemptToLogin',
        ])->setName('attemptToLogin');

        $this->addGet('/logout', [
            'action' => 'logout',
        ])->setName('logout');

        $this->addGet('/register', [
            'action' => 'showRegistrationForm',
        ])->setName('showRegistrationForm');

        $this->addPost('/register/store', [
            'action' => 'storeRegistrationForm',
        ])->setName('storeRegistrationForm');

        $this->addGet('/activation/{token}', [
            'action' => 'activateUser',
        ])->setName('activateUser');
    }
}
