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

        $this->add('/login/:params', [
            'action' => 'showLoginForm',
            'params' => 1,
        ])->setName('showLoginForm');

        $this->add('/attempt', [
            'action' => 'attemptToLogin',
        ])->setName('attemptToLogin');

        $this->add('/logout', [
            'action' => 'logout',
        ])->setName('logout');

        $this->add('/register', [
            'action' => 'showRegistrationForm',
        ])->setName('showRegistrationForm');

        $this->add('/register/store', [
            'action' => 'storeRegistrationForm',
        ])->setName('storeRegistrationForm');

        $this->add('/activation/{token}', [
            'action' => 'activateUser',
        ])->setName('activateUser');
    }
}