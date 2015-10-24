<?php
namespace Components\Command;

use Phalcon\Acl\Role as PhalconRole;
use Bootstrap\Support\Http\Middleware\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewares = [
        'acl'  => Middleware\ACL::class,
        'auth' => Middleware\Auth::class,
        'csrf' => Middleware\CSRF::class,
    ];

    public function initialize()
    {
        # - the code below is hard-coded, you can add the current user role

        di()->get('acl')->addRole(new PhalconRole('guest'));
    }
}