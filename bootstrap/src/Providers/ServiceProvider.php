<?php
namespace Bootstrap\Providers;

use Exception;
use Bootstrap\Services\ServiceMagicMethods;
use Bootstrap\Exceptions\ServiceAliasNotFoundException;

class ServiceProvider
{
    use ServiceMagicMethods;

    protected $alias = null;
    protected $shared = false;
    protected $publishStack = [];

    /**
     * Get the provider if it is a shared or not
     *
     * @return boolean
     */
    public function getShared()
    {
        return $this->shared;
    }

    /**
     * Get the service alias when accessing to di()->get(<alias>)
     *
     * @return string
     */
    public function getAlias()
    {
        if (strlen($this->alias) == 0) {
            throw new ServiceAliasNotFoundException(
                'protected $alias not found on service "' . get_class($this) . '"'
            );
        }

        return $this->alias;
    }

    /**
     * Call the register() function who extends this class
     * by default, register() will return a false result
     *
     * @return mixed
     */
    public function callRegister()
    {
        $register = $this->register();

        if ($register === false) {
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

    /**
     * The process after all di are loaded
     *
     * @return bool
     */
    public function boot()
    {
        return false;
    }

    /**
     * Registered process based on DI scope
     *
     * @return bool
     */
    public function register()
    {
        return false;
    }

    /**
     * [publish description]
     *
     * @param  mixed  $paths The array paths to be copied from and to
     * @param  string $tag   The tag name to be triggered upon running command
     */
    public function publish(Array $paths, $tag = null)
    {
        if ( $tag ) {
            $this->publishStack[ $tag ] = $paths;
        } else {
            $this->publishStack[] = $paths;
        }
    }

    /**
     * Get published stacks based on tag
     *
     * @param  string $tag The tag name to be triggered upon running command
     *
     * @return mixed       Stack of all publish keys
     */
    public function getToBePublished($tag = null)
    {
        if ( $tag ) {

            if ( ! isset($this->publishStack[ $tag ]) ) {
                throw new Exception('Tag not found.');
            }

            return [
                $this->publishStack[ $tag ]
            ];
        }

        return $this->publishStack;
    }
}
