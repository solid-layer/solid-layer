<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class AuthRoutes extends RouterGroup
{
  public function initialize()
  {
    $this->setPaths([
      'namespace' => 'App\Controllers',
      'controller' => 'Auth',
    ]);

    # All the routes start with /auth
    $this->setPrefix('/auth');

    # Add a route to the group
    $this->add('/show', [
      'action' => 'show'
    ]);

    # Add a route to the group
    $this->add('/new', [
      'action' => 'new'
    ]);

    # Add a route to the group
    $this->addPost('/store', [
      'action' => 'store'
    ]);
  }
}