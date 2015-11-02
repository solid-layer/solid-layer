<?php

use Bootstrap\Console\CLI;

class OptimizeTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $GLOBALS['kernel']->run('main');
    }

    public function tearDown()
    {
        $compiled_file = 'storage/slayer/compiled.php';

        if ( file_exists($compiled_file) ) {
            di()->get('flysystem')->delete($compiled_file);
        }
    }

    public function testOptimizeCommand()
    {
        CLI::bash([
            'php brood optimize',
        ]);

        $has_file = file_exists(config()->path->storage . 'slayer/compiled.php');
        $this->assertTrue($has_file, 'check if classes were generated and compiled');
    }
}
