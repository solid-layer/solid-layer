<?php
namespace Bootstrap\Console\Server;

use Bootstrap\Console\CLI;
use Bootstrap\Console\SlayerCommand;

class OptimizeCommand extends SlayerCommand
{
    protected $name = 'optimize';

    protected $description = "Combine all classes defined in the compile php file";

    public function slash()
    {
        $output = CLI::bash([
            'composer dumpautoload --optimize',
        ]);

        $this->info('Removing previous compiled file...');

        $compiled_file = BASE_PATH . '/storage/slayer/compiled.php';
        if ( file_exists($compiled_file) ) {
            unlink($compiled_file);
        }

        $this->comment( $output );

        $output = CLI::bash([
            'php vendor/classpreloader/console/classpreloader.php compile ' .
            '--config="bootstrap/compiler.php" ' .
            '--output="' . config()->path->storage . '/slayer/compiled.php" ' .
            '--strip_comments=1',
        ]);

        $this->comment( $output );
    }
}
