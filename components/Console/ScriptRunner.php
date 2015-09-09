<?php

namespace Components\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ScriptRunner extends Command
{
    protected $name = 'script:run';

    protected $description = 'An automated script to be run.';

    public function slash()
    {
        $lines = [
            'cd /var/www/phalcondaison/',
            'git pull origin master',
            'composer dumpautoload',
            'composer update',
        ];

        $combined_lines = null;

        foreach ( $lines as $line ) {
            $combined_lines .= "echo \"\e[32m{$line}\e[37m\";" .  $line . ";\n";
        }

        $output = shell_exec($combined_lines . " 2>&1");
        if ($output) {
            $this->comment($output);
        }
    }
}