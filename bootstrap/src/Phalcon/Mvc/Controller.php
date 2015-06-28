<?php

namespace Bootstrap\Phalcon\Mvc;

class Controller extends \Phalcon\Mvc\Controller
{
    public function acl($alias)
    {
        $class = slayer_config()->slayer_acl->classes[$alias];

        $obj = new $class;
        $obj->load();
    }
}