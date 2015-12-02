<?php
namespace Components\Command\Middleware;

use League\Tactician\Middleware;

class Auth implements Middleware
{
    public function execute($command, callable $next)
    {
        $di        = $command->getDI();
        $url       = $di->get('url');
        $auth      = $di->get('auth');
        $flash_bag = $di->get('flash_bag');
        $redirect  = $di->get('redirect');

        if ($auth->check() === false) {
            $flash_bag->error('Please login to access this page.');

            $redirect->to(
                $url->get(
                    $url->route('showLoginForm'),
                    ['ref' => $url->current()]
                )
            );
        }

        return $next($command);
    }
}
