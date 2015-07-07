<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class NewsfeedRoutes extends RouterGroup
{
  public function initialize()
  {
    $this->setPaths([
      'namespace' => 'App\Controllers',
      'controller' => 'Newsfeed',
    ]);


    $this->setPrefix('/newsfeed');

    # /newsfeed
    $this->add('', [
      'action' => 'index'
    ]);


    $this->add('/show/{id}', [
      'action' => 'show'
    ]);


    $this->add('/new', [
      'action' => 'new'
    ]);


    $this->addPost('/store', [
      'action' => 'store'
    ]);


    $this->addPost('/delete/{id}', [
      'action' => 'delete'
    ]);
  }
}