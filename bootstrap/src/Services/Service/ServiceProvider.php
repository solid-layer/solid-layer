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


    protected $_publish = [];


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


    public function publish(Array $paths, $tag = null)
    {
        if ($tag) {
            $this->_publish[$tag] = $paths;
        } else {
            $this->_publish[] = $paths;
        }
    }
    
    public function getToBePublished($tag = null)
    {
        if ($tag) {
            if (! isset($this->_publish[$tag])) {
                throw new Exception('Tag not found.');
            }

            return [$this->_publish[$tag]];
        }

        return $this->_publish;
    }
}