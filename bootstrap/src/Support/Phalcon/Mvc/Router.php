<?php
namespace Bootstrap\Support\Phalcon\Mvc;

use Phalcon\Mvc\Router as PhalconMvcRouter;

class Router extends PhalconMvcRouter
{
    public function __construct($bool)
    {
        parent::__construct($bool);
    }

    private function getParsedRoutes($target)
    {

        $route_name = null;

        $uses = [];

        if (is_string($target)) {
            $uses = explode('@', $target);

        } elseif (is_array($target)) {
            $route_name = @$target[ 'as' ] ?: null;

            if (isset( $target[ 'uses' ] )) {
                $uses = explode('@', $target[ 'uses' ]);
            }
        }

        # - get the default namespace from the dispatcher
        $default_namespace = $this->getDI()->get('dispatcher')->getDefaultNamespace() . '\\';


        # - if the uses is not empty, we should get the class properties
        # such as namespace, class short name
        if (!empty( $uses )) {
            $reflection = new \ReflectionClass($default_namespace . $uses[ 0 ]);

            # - let's get the reflected class namespace
            $namespace = $reflection->getNamespaceName();

            # - this strips out all the word 'Controller'
            # and then getting the reflected class short name
            $controller = str_replace('Controller', '',
                $reflection->getShortName());

            # - get the action based on the index[1]
            $action = $uses[ 1 ];

            $target = [
                'controller' => $controller,
                'action'     => $action,
            ];

            if ($namespace) {
                $target[ 'namespace' ] = $namespace;
            }
        }

        return [
            'target' => $target,
            'name'   => $route_name,
        ];
    }

    private function createRoute($verb, $name, $target)
    {
        $parsed_route = $this->getParsedRoutes($target);

        $func = 'add' . $verb;
        $route = $this->{$func}($name, $parsed_route[ 'target' ]);

        if (strlen($parsed_route[ 'name' ]) != 0) {
            $route->setName($parsed_route[ 'name' ]);
        }

        return $route;
    }

    public function get($name, $target)
    {
        return $this->createRoute('Get', $name, $target);
    }

    public function post($name, $target)
    {
        return $this->createRoute('Post', $name, $target);
    }
}
