<?php

namespace Bootstrap\Phalcon\Mvc;

use Phalcon\Mvc\View as PhalconView;
use Bootstrap\Exceptions\ViewFileNotFoundException;

/**
 * @author Daison Carino <daison12006013 [at] gmail [dot] com>
 */
class View extends PhalconView
{
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
        $views_dir = slayer_config()->application->viewsDir;
        $full_path = $views_dir . $path;

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
}