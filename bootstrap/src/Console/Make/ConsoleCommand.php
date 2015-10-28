<?php
namespace Bootstrap\Console\Make;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputArgument;

class ConsoleCommand extends SlayerCommand
{
    protected $name = 'make:console';

    protected $description = 'Generate a new console';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        $stub = file_get_contents(__DIR__ . '/stubs/makeConsole.stub');
        $stub = str_replace('{consoleName}', $arg_name, $stub);

        $file_name = $arg_name . 'Command.php';
        chdir(config()->path->console);
        $this->comment('Crafting Console...');

        if (file_exists($file_name)) {
            $this->error('   Console already exists!');
        } else {
            file_put_contents($file_name, $stub);
            $this->info('   Console has been created!');
        }
    }

    protected function arguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Console name to be used'],
        ];
    }
}
