<?php

use Mockery as m;

class HelperTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testInstances()
    {
        $this->assertInstanceOf(\Phalcon\Security::class, security());
        $this->assertInstanceOf(\Phalcon\Tag::class, tag());
        $this->assertInstanceOf(\Phalcon\Mvc\Router::class, route());
        $this->assertInstanceOf(
            \Phalcon\Http\Response::class, 
            response()
        );
        $this->assertInstanceOf(\Phalcon\Mvc\View::class, view());
        $this->assertInstanceOf(\Phalcon\Config::class, config());
        $this->assertInstanceOf(\Phalcon\Mvc\Url::class, url());
        $this->assertInstanceOf(
            \Bootstrap\Support\Redirect\Redirect::class, 
            redirect()
        );
    }

    public function testCapabilities()
    {
        # getting the route should return the full path url
        $this->assertEquals(
            env('BASE_URI').'auth/login', 
            route('showLoginForm')
        );

        # You will get an error if the file 'welcome.volt not found'
        # The only solution to know if this work
        $this->assertInstanceOf(
            \Phalcon\Mvc\View::class, view('welcome')
        );

        # by default the 'app.cache' is updated
        $this->assertFalse(
            config('app.cache')
        );
    }
}