<?php

namespace Bootstrap\Services\Service;

/**
* @author Daison Carino <daison12006013 [at] gmail [dot] com>
*/
class ServiceContainer
{
    protected $_alias = null;
    protected $_shared = false;

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
        return slayer_config();
    }

    public function getDI()
    {
        return di();
    }

    public function getApp()
    {
        return app();
    }

    public function afterBoot() {}

    public function beforeBoot() {}

    public function boot() { 
        return false; 
    }
}