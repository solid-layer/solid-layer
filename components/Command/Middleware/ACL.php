<?php
namespace Components\Command\Middleware;

use League\Tactician\Middleware;
use Bootstrap\Exceptions\AccessNotAllowedException;

class ACL implements Middleware
{
    public function execute($command, callable $next)
    {
        $di         = $command->getDI();
        $router     = $di->get('router');
        $acl        = $di->get('acl');

        $is_allowed = $acl->isAllowed(
            'guest',
            $router->getControllerName(),
            $router->getActionName()
        );

        if ( $is_allowed == false ) {
            throw new AccessNotAllowedException(
                'You are not allowed to access this page'
            );
        }

        return $next($command);
    }

}