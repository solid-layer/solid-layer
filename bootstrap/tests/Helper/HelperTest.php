<?php

// use Mockery as m;

use Bootstrap\Support\Redirect\Redirect;
use Phalcon\Security;
use Phalcon\Tag;
use Phalcon\Mvc\Router;
use Phalcon\Http\Response;
use Phalcon\Mvc\View;
use Phalcon\Config;
use Phalcon\Mvc\Url;

class HelperTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $GLOBALS['kernel']->run('main');
    }

    public function testInstances()
    {
        $this->assertInstanceOf(Config::class, config());
        $this->assertInstanceOf(Redirect::class, redirect());
        $this->assertInstanceOf(Response::class, response());
        $this->assertInstanceOf(Router::class, route());
        $this->assertInstanceOf(Security::class, security());
        $this->assertInstanceOf(Tag::class, tag());
        $this->assertInstanceOf(Url::class, url());
        $this->assertInstanceOf(View::class, view());
    }

    public function testCapabilities()
    {
        $this->assertContains(config()->app->debug, [
            true,
            false,
        ]);

        # - getting the route should return the full path url

        $this->assertContains(
            url()->getBaseUri() . 'auth/login',
            route('showLoginForm')
        );

        # - You will get an error if the file 'welcome.volt not found',
        # the only solution to know if this works is to know the instance

        $this->assertInstanceOf(View::class, view('welcome'));
    }
}