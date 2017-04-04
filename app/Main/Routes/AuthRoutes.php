<?php

namespace App\Main\Routes;

class AuthRoutes extends RouteGroup
{
    public function initialize()
    {
        $this->setPrefix('/auth');

        $this->setPaths([
            'controller' => 'Auth',
        ]);

        $this->addGet('/login/:params', [
            'action' => 'showLoginForm',
            'params' => 1,
        ])->setName('show-login-form');

        $this->addPost('/attempt', [
            'action' => 'attemptToLogin',
        ])->setName('attempt-to-login');

        $this->addGet('/logout', [
            'action' => 'logout',
        ])->setName('logout');

        $this->addGet('/register', [
            'action' => 'showRegistrationForm',
        ])->setName('show-registration-form');

        $this->addPost('/register/store', [
            'action' => 'storeRegistrationForm',
        ])->setName('store-registration-form');

        $this->addGet('/activation/{token}', [
            'action' => 'activateUser',
        ])->setName('activate-user');
    }
}
