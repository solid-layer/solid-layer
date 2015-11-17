<?php
namespace Bootstrap\Support\Http\Middleware;

use Phalcon\Acl\Resource;
use League\Tactician\Middleware;
use Bootstrap\Exceptions\AccessNotAllowedException;

class ACL implements Middleware
{
    private $di;

    public function execute($command, callable $next)
    {
        $this->di = $command->getDI();

        $roles = $this->di->get('config')->acl->access->toArray();

        $this->callResourceManager($this->normalizedRoles($roles));

        foreach ( $this->allowedRoles($roles) as $role_name ) {

            $is_allowed = $this->di->get('acl')->isAllowed(
                $role_name,
                $this->di->get('router')->getControllerName(),
                $this->di->get('router')->getActionName()
            );

            if ( $is_allowed === false ) {
                throw new AccessNotAllowedException(
                    'You are not allowed to access this page'
                );
            }
        }

        return $next($command);
    }

    private function allowedRoles($roles)
    {
        $allowed_roles = [];

        foreach ( $roles as $role_name => $role ) {
            $allowed_roles[] = $role_name;
        }

        return $allowed_roles;
    }

    private function normalizedRoles($roles)
    {
        $normalized_roles = [];

        foreach ( $roles as $role_name => $role ) {
            foreach ( $role as $controller ) {

                $attr = explode('::', $controller);

                $controller_name = trim($attr[0]);
                $actions = explode(',', trim(str_replace(' ', '', $attr[1])));

                $role_found = false;

                foreach ( $this->di->get('acl')->getRoles() as $role ) {
                    if ($role->getName() == $role_name) {
                        $role_found = true;
                    }
                }

                if ( $role_found === false ) {
                    continue;
                }

                $normalized_roles[$role_name] = [
                    [$controller_name => $actions],
                ];
            }
        }

        return $normalized_roles;
    }

    protected function callResourceManager($normalized_roles)
    {
        foreach ( $normalized_roles as $role_name => $idx ) {
            foreach ( $idx as $controllers ) {
                foreach ( $controllers as $controller_name => $actions ) {

                    $this->di->get('acl')->addResource(
                        new Resource($controller_name),
                        $actions
                    );

                    $this->di->get('acl')->allow(
                        $role_name,
                        $controller_name,
                        $actions
                    );
                }
            }
        }

        return $this;
    }
}
