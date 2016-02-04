<?php
namespace Components\Command;

use Clarity\Support\Http\Middleware\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewares = [
        'auth' => Middleware\Auth::class,
        'csrf' => Middleware\CSRF::class,
    ];
}
