<?php

namespace Bootstrap\Services;

/**
* @author Daison Carino <daison12006013 [at] gmail [dot] com>
*/
class ServiceContainer
{
    private $array_config;
    protected $_alias = null;
    protected $_shared = false;

    public function __construct($array_config)
    {
        $this->array_config = $array_config;
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

    public function getBoot()
    {
        return $this->boot();
    }

    public function getConfig()
    {
        return $this->array_config['config'];
    }

    public function getDI()
    {
        return $this->array_config['di'];
    }

    public function getApp()
    {
        return $this->array_config['app'];
    }

    public function afterBoot() {}

    public function beforeBoot() {}

    public function boot() { 
        return false; 
    }
}