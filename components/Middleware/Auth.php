<?php
namespace Components\Middleware;

class Auth implements \League\Tactician\Middleware
{
    public function execute($command, callable $next)
    {
        if ( auth()->check() === false ) {

            flashbag()->error('Please login to access this page.');

            redirect(

                url(
                    route('showLoginForm'),
                    [
                        'ref' => url()->current()
                    ]
                )
            );
        }

        return $next($command);
    }
}
