<?php
namespace Components\Command;

use Phalcon\Acl\Role as PhalconRole;
use Clarity\Support\Http\Middleware\ACL as HttpACL;
use Clarity\Support\Http\Middleware\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewares = [
        'acl'  => HttpACL::class,
        'auth' => Middleware\Auth::class,
        'csrf' => Middleware\CSRF::class,
    ];

    public function initialize()
    {
        # - the code below is hard-coded, you can add it by fetching your
        # database table and loop into it and change the 'guest' to something
        # that you've stored.

        di()->get('acl')->addRole(new PhalconRole('guest'));
    }
}
