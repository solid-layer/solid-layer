<?php
namespace Bootstrap\Console\Vendor;

use Bootstrap\Console\SlayerCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PublishCommand extends SlayerCommand
{
    protected $name        = 'vendor:publish';

    protected $description = 'Publish a vendor package';

    public function slash()
    {
        $alias = $this->input->getArgument('alias');
        $tag = $this->input->getOption('tag');

        foreach (config()->app->services as $service) {
            $obj = new $service;
            if ($alias != $obj->getAlias()) {
                continue;
            }

            $obj->boot();

            try {
                $tags = $obj->getToBePublished($tag);

                foreach ($tags as $tag) {
                    foreach ($tag as $source => $dest) {
                        cp($source, $dest);
                    }
                }
            } catch (Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }

    public function arguments()
    {
        return [
            ['alias', InputArgument::REQUIRED, 'Provider alias'],
        ];
    }

    protected function options()
    {
        return [
            [
                'tag',
                null,
                InputOption::VALUE_OPTIONAL,
                'Specify which tag you want to publish',
                null,
            ],
        ];
    }
}