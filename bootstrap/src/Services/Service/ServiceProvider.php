<?php

namespace Bootstrap\Services\Service;

use Exception;
use Bootstrap\Services\ServiceMagicMethods;

class ServiceProvider
{
    use ServiceMagicMethods;

    /**
     * By default $_alias is null
     */
    protected $_alias = null;


    /**
     * By default $_shared is false
     */
    protected $_shared = false;


    /**
     * Get the if the provider is a shared or not
     *
     * @return boolean
     */
    public function getShared()
    {
        return $this->_shared;
    }


    /**
     * Get the service alias when accessing to di()->get(<alias>)
     *
     * @return String
     */
    public function getAlias()
    {
        if (strlen($this->_alias) == 0) {
            throw new ServiceAliasNotFoundException(
                'protected $_alias not found on service "' . get_class($this) . '"'
            );
        }

        return $this->_alias;
    }


    /**
     * call the register() function who extends this class
     * by default, register() will return a false result
     *
     * @return mixed
     */
    public function callRegister()
    {
        $register = $this->register();

        if ( $register == false ) {
            throw new Exception(
                'register method not found on service "' . get_class($this) . '"'
            );
        }

        return $register;
    }


    /**
     * Get the global config in the <root>/config/... files
     *
     * @return mixed
     */
    public function getConfig()
    {
        return config();
    }


    public function boot() { return false; }
    public function register() { return false; }
}