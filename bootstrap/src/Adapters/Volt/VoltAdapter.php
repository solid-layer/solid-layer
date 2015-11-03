<?php
namespace Bootstrap\Adapters\Volt;

use Phalcon\Di\FactoryDefault;
use Bootstrap\Support\Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as PhalconVoltEngine;

class VoltAdapter extends PhalconVoltEngine
{
    public function __construct(View $view, FactoryDefault $di)
    {
        parent::__construct($view, $di);

        $this->setOptions([
            'compiledPath'      => config()->path->storage_views,
            'compiledSeparator' => '_',
        ]);

        $compiler = $this->getCompiler();


        # - others

        $compiler->addFunction('di', 'di');
        $compiler->addFunction('env', 'env');
        $compiler->addFunction('echo_pre', 'echo_pre');
        $compiler->addFunction('csrf_field', 'csrf_field');
        $compiler->addFunction('dd', 'dd');
        $compiler->addFunction('config', 'config');


        # - facade

        $compiler->addFunction('security', 'security');
        $compiler->addFunction('tag', 'tag');
        $compiler->addFunction('route', 'route');
        $compiler->addFunction('response', 'response');
        $compiler->addFunction('view', 'view');
        $compiler->addFunction('config', 'config');
        $compiler->addFunction('url', 'url');
        $compiler->addFunction('request', 'request');


        # - paths

        $compiler->addFunction('base_uri', 'base_uri');
    }
}
