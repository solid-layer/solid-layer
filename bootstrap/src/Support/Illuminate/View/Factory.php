<?php

namespace Bootstrap\Support\Illuminate\View;

use Illuminate\View\ViewFinderInterface;

class Factory
{
    protected $blade;
    protected $sections = [];
    protected $sectionStack = [];

    private $path;

    public function __construct($blade)
    {
        $this->blade = $blade;
    }

    public function startSection($section, $content = '')
    {
        if ($content === '') {
            if (ob_start()) {
                $this->sectionStack[] = $section;
            }
        } else {
            $this->extendSection($section, $content);
        }
    }

    public function stopSection($overwrite = false)
    {
        $last = array_pop($this->sectionStack);

        if ($overwrite) {
            $this->sections[$last] = ob_get_clean();
        } else {
            $this->extendSection($last, ob_get_clean());
        }

        return $last;
    }

    protected function extendSection($section, $content)
    {
        if (isset($this->sections[$section])) {
            $content = str_replace('@parent', $content, $this->sections[$section]);
        }

        $this->sections[$section] = $content;
    }

    public function make($view, $data = [], $mergeData = [])
    {
        $view = $this->normalizeName($view);
        $view = $this->blade->getView()->getViewsDir() . str_replace('.', '/', $view);

        $this->__path = str_replace('//', '/', $view . '.blade.php');

        return $this;
    }

    public function render()
    {
        ob_start();

        $compiled_path = $this->blade->compiler()
            ->getCompiledPath($this->__path);

        $__env = $this;

        include $compiled_path;

        return ob_get_clean();
    }

    protected function normalizeName($name)
    {
        $delimiter = ViewFinderInterface::HINT_PATH_DELIMITER;

        if (strpos($name, $delimiter) === false) {
            return str_replace('/', '.', $name);
        }

        list($namespace, $name) = explode($delimiter, $name);

        return $namespace.$delimiter.str_replace('/', '.', $name);
    }

    public function yieldContent($section, $default = '')
    {
        $sectionContent = $default;

        if (isset($this->sections[$section])) {
            $sectionContent = $this->sections[$section];
        }

        $sectionContent = str_replace('@@parent', '--parent--holder--', $sectionContent);

        return str_replace(
            '--parent--holder--', '@parent', str_replace('@parent', '', $sectionContent)
        );
    }

}