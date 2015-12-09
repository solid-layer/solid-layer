<?php
namespace Components\Command\Middleware;

use League\Tactician\Middleware;
use Clarity\Exceptions\AccessNotAllowedException;

class CSRF implements Middleware
{
    public function execute($command, callable $next)
    {
        $di       = $command->getDI();
        $request  = $di->get('request');
        $security = $di->get('security');

        if ($request->isPost()) {
            if ($security->checkToken() === false) {

                # - throw exception or redirect the user
                # or render a content using
                # View::take(<resources.view>);exit;

                throw new AccessNotAllowedException('Token mismatch, what are you doing?');
            }
        }

        return $next($command);
    }
}
