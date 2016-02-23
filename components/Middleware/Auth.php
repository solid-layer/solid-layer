<?php
namespace Components\Middleware;

class Auth implements \League\Tactician\Middleware
{
    public function execute($request, callable $next)
    {
        if ( auth()->check() === false ) {

            flash_bag()->error('Please login to access this page.');

            redirect(

                url(
                    route('showLoginForm'),
                    [
                        'ref' => url()->current()
                    ]
                )
            );
        }

        return $next($request);
    }
}
