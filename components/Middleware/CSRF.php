<?php
namespace Components\Middleware;

use Clarity\Exceptions\AccessNotAllowedException;

class CSRF implements \League\Tactician\Middleware
{
    public function execute($request, callable $next)
    {
        if ( $request->isPost() ) {

            if ( security()->checkToken() === false ) {

                # - throw exception or redirect the user
                # or render a content using
                # View::take(<resources.view>);exit;

                throw new AccessNotAllowedException('Token mismatch, what are you doing?');
            }
        }

        return $next($request);
    }
}
