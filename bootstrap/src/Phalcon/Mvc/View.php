<?php

namespace Bootstrap\Phalcon\Mvc;

use Phalcon\Mvc\View as PhalconView;

class View extends PhalconView
{
  protected function _changeDotToSlash($path)
  {
    $path = str_replace('.', '/', $path);

    return $path;
  }

  public function make($path, $records = [])
  {
    $path = $this->_changeDotToSlash($path);

    $this->pick($path);

    return $this;
  }
}