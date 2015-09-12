<?php

namespace Bootstrap\Adapters\Blade;

use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Phalcon\Mvc\View\Engine;
use Illuminate\Filesystem\Filesystem;

class BladeAdapter extends Engine
{
    protected $blade;

    public function __construct($view, $di)
    {
        parent::__construct($view, $di);
    }

    public function render($path, $params)
    {
        $blade_engine = new CompilerEngine(
            new BladeCompiler( new Filesystem, config()->path->storage_views)
        );
        $c = $blade_engine->getCompiler();


        # - let's check if the blade file time is different
        # from the compiled file

        if ($c->isExpired($path)) {
            $c->compile($path);
        }


        # - now buffer the compiled template to get the php variables
        # and also declare under the buffer about the parameters.


        ob_start();

        foreach ($params as $key => $value) {
            ${$key} = $value;
        }

        include $c->getCompiledPath($path);

        di()->get('view')->setContent(ob_get_clean());
    }
}