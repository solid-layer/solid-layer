<?php

class CheckVariableReturnTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $GLOBALS['kernel']->run('main');
    }

    public function testAppFile()
    {
        $this->assertContains(config()->app->debug, [
            true,
            false,
        ]);
    }
}