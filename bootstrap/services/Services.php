<?php

namespace Bootstrap\Services;

abstract class Services
{
  protected $config;
  protected $_alias = null;
  protected $_shared = false;

  public function __construct($config)
  {
    $this->config = $config;
  }

  public function dispatcher()
  {
    return false;    
  }

  public function hasAlias()
  {
    if (strlen($this->_alias) != 0) {
      return true;
    }

    return false;
  }

  public function getShared()
  {
    return $this->_shared;
  }

  public function getAlias()
  {
    return $this->_alias;
  }

  public function getDispatcher()
  {
    return $this->dispatcher();
  }
}