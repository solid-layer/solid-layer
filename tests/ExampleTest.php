<?php

class ExampleTest extends PHPUnit_Framework_TestCase
{
    /**
     * Calling the global variable 'kernel'
     * to run the module 'main'
     */
    public function setUp()
    {
        $GLOBALS['kernel']->modules()->run('main');
    }

    public function testMyApplication()
    {
        // ... add a db record
        // ... do some assertions
        // ... do other stuff
        // ... call model functions for checking
        // ... do assertions again

        $this->assertTrue(true);
    }
}
