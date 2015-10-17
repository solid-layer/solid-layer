<?php
namespace Bootstrap\Adapters\Blade;

use Log;
use Phalcon\Mvc\View\Engine;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;
use Bootstrap\Support\Illuminate\View\Factory;

class BladeAdapter extends Engine
{
    protected $blade;

    public function __construct($view, $di)
    {
        parent::__construct($view, $di);

        $this->blade = new CompilerEngine(
            new BladeCompiler( new Filesystem, config()->path->storage_views)
        );
    }

    public function render($path, $params = [])
    {
        $path = str_replace($this->getView()->getViewsDir(), '', $path);
        $path = str_replace('.blade.php', '', $path);

        $view = new Factory($this->blade, $this->getView()->getViewsDir());

        di()
            ->get('view')
            ->setContent(
                $view
                    ->make($path, $params)
                    ->render()
            );
    }
}