<?php

namespace Bootstrap\Support\Phalcon\Mvc;

use Phalcon\Mvc\View as PhalconView;
use Bootstrap\Exceptions\ViewFileNotFoundException;
use Bootstrap\Exceptions\BadMethodCallException;

/**
 * @author Daison Carino <daison12006013 [at] gmail [dot] com>
 */
class View extends PhalconView
{
    const LEVEL_NO_RENDER = 0;
    const LEVEL_ACTION_VIEW = 1;
    const LEVEL_BEFORE_TEMPLATE = 2;
    const LEVEL_LAYOUT = 3;
    const LEVEL_AFTER_TEMPLATE = 4;
    const LEVEL_MAIN_LAYOUT = 5;

    /**
     * Magic methods that uses 'withVarName'
     *
     * @return string
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'with')) {
            return $this->with(snake_case(substr($method, 4)), $parameters[0]);
        }
 
        throw new BadMethodCallException("Method [$method] does not exist on view.");
    }


    /**
     * Replacing dots into slashes
     *
     * @return string
     */
    protected function _changeDotToSlash($path)
    {
        $path = str_replace('.', '/', $path);

        return $path;
    }


    /**
     * 
     * @return bool
     */
    public function checkViewPath($path)
    {
        $full_path = di()->get('view')->getViewsDir() . $path;

        $result = glob($full_path . '.*');
        if ( ! $result ) {
            throw new ViewFileNotFoundException(
                'Views file path(' . $full_path . ') not found.'
            );
        }
    }


    /**
     * Assigning the view file path
     *
     * @return mixed
     */
    public function make($path, $records = [])
    {
        $path = $this->_changeDotToSlash($path);
        $this->checkViewPath($path);

        return $this->pick($path);
    }


    /**
     * Reconstructing setVar using the popular function 'with'
     *
     * @return mixed
     */
    public function with($key, $val)
    {
        return $this->setVar($key, $val);
    }


    /**
     * Reconstructing setVars into a batch arrays
     *
     * @return mixed
     */
    public function batch($array)
    {
        return $this->setVars($array);
    }


    /**
     * Get the content
     *
     * @return string
     */
    public function take($view, $params = null)
    {
        $view = $this->_changeDotToSlash($view);

        return $this->getRender(null, $view, $params);
    }

}