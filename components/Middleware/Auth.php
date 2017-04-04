<?php

namespace Components\Middleware;

class Auth implements \League\Tactician\Middleware
{
    public function execute($request, callable $next)
    {
        if (auth()->check()) {
            return $next($request);
        }

        flash()->session()->error('Please login to access this page.');

        redirect(
            url(
                route('show-login-orm'),
                ['ref' => url()->current()]
            )
        );
    }
}
