<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SlayerCommand extends Command
{
    protected $_arguments;
    protected $_options;
    protected $input;
    protected $output;

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $this->slash();
    }

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description);

        if (count($this->arguments())) {
            foreach ($this->arguments() as $arg) {
                $this->addArgument(@$arg[0], @$arg[1], @$arg[2], @$arg[3]);
            }
        }

        if (count($this->options())) {
            foreach ($this->options() as $opt) {
                $this->addOption(@$opt[0], @$opt[1], @$opt[2], @$opt[3], @$opt[4]);
            }
        }

        return $this;
    }



    protected function arguments()
    {
        return [];
    }

    protected function options()
    {
        return [];
    }


    public function info($string)
    {
        $this->output->writeln("<info>$string</info>");
    }


    public function line($string)
    {
        $this->output->writeln($string);
    }


    public function comment($string)
    {
        $this->output->writeln("<comment>$string</comment>");
    }


    public function error($string)
    {
        $this->output->writeln("<error>$string</error>");
    }

}