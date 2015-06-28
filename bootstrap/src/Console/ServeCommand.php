<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ServeCommand extends SlayerCommand
{
    protected $name = 'serve';

    protected $description = "Serve the application on the PHP development server";

    public function fire()
    {
        $base = slayer_config()->application->baseUri;
        chdir($base . '/public');

        $host = $this->input->getOption('host');
        $port = $this->input->getOption('port');

        $this->info("PhalconSlayer development server started on http://{$host}:{$port}/");

        passthru('"'.PHP_BINARY.'"'." -S {$host}:{$port} \"{$base}\"/.htrouter.php");
    }

    protected function options()
    {
        $host = 'localhost';
        $port = 8000;

        if (getenv('SERVE_HOST')) {
            $host = getenv('SERVE_HOST');
        }

        if (getenv('SERVE_PORT')) {
            $port = getenv('SERVE_PORT');
        }

        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', $host],
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', $port],
        ];
    }
}