<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class AuthRoutes extends RouterGroup
{
  public function initialize()
  {
    $this->setPaths([
      // 'namespace' => 'App\Controllers',
      'controller' => 'Auth',
    ]);

    # All the routes start with /auth
    $this->setPrefix('/auth');

    # Add a route to the group
    $this->add('/login', [
      'action' => 'showLoginForm'
    ])->setName('showLoginForm');

    # Add a route to the group
    $this->add('/register', [
      'action' => 'showRegistrationForm'
    ])->setName('showRegistrationForm');

    # Add a route to the group
    $this->add('/register/store', [
      'action' => 'storeRegistrationForm'
    ])->setName('storeRegistrationForm');

    $this->add('/activation/{token}', [
      'action' => 'activateUser',
    ])->setName('activateUser');

    # Add a route to the group
    $this->add('/attempt', [
      'action' => 'attemptToLogin'
    ])->setName('attemptToLogin');

    # Add a route to the group
    $this->add('/logout', [
      'action' => 'logout'
    ])->setName('logout');
  }
}