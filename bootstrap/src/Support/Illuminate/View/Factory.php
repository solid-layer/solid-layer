<?php

namespace Bootstrap\Support\Illuminate\View;

use Illuminate\View\ViewFinderInterface;

class Factory
{
    protected $blade;
    protected $sections = [];
    protected $sectionStack = [];

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

        $this->blade->render($view . '.blade.php');

        return $this->blade;
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
}