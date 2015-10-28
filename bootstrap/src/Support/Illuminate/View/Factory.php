<?php
namespace Bootstrap\Support\Illuminate\View;

use Illuminate\View\ViewFinderInterface;

class Factory
{
    protected $views_dir;
    protected $sections     = [];
    protected $sectionStack = [];

    private   $engine;
    private   $path;
    private   $params       = [];

    public function __construct($engine, $views_dir)
    {
        $this->engine  = $engine;
        $this->views_dir = $views_dir;
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

    public function make($view, $data = [], $merge_data = [])
    {
        $view = $this->normalizeName($view);
        $view = $this->views_dir . str_replace('.', '/', $view);

        $this->path = str_replace('//', '/', $view . '.blade.php');

        $this->params = $data;
        if (!empty($merge_data)) {
            $this->params = array_merge($this->params, $merge_data);
        }

        return $this;
    }

    public function render()
    {
        if ($this->getEngineCompiler()->isExpired($this->path)) {
            $this->getEngineCompiler()->compile($this->path);
        }

        ob_start();

        $__env = $this;

        if ( !empty($this->params) ) {
            foreach ($this->params as $key => $value) {
                ${$key} = $value;
            }
        }

        require $this->getEngineCompiler()->getCompiledPath($this->path);

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

    public function getEngineCompiler()
    {
        return $this->getEngine()->getCompiler();
    }

    public function getEngine()
    {
        return $this->engine;
    }
}
