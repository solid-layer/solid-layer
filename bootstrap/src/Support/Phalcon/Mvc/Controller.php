<?php

namespace Bootstrap\Support\Phalcon\Mvc;

class Controller extends \Phalcon\Mvc\Controller
{
    private $action_name;
    private $controller_name;
    private $options = [];

    /**
     * This will be called first by Default from Phalcon Docs
     */
    public function beforeExecuteRoute($dispatcher)
    {
        $this->action_name = $dispatcher->getActionName();
        $this->controller_name = $dispatcher->getControllerName();
    }


    /**
     * If user's will be calling acl
     */
    public function acl($alias, $options = [])
    {
        # - now load the acl class

        $class = config()->acl->classes[ $alias ];

        $acl = new AclLoader(new $class);
        $acl
            ->setActionName($this->action_name)
            ->setControllerName($this->controller_name)
            ->setOptions($options)
            ->setOnlyActions($this->_getOnlyActions($options))
            ->setExceptActions($this->_getExceptActions($options))
            ->load();
    }


    private function _valueToKeyCombiner($records)
    {
        # make the value as key as well

        foreach ($records as $idx => $record) {
            $records[ $record ] = $record;
            unset( $records[ $idx ] );
        }

        return $records;
    }


    private function _getOnlyActions($options)
    {
        if ( ! isset($options[ 'only' ]) ) {
            return [];
        }

        return $this->_valueToKeyCombiner($options[ 'only' ]);
    }


    private function _getExceptActions($options)
    {
        if ( ! isset($options[ 'except' ]) ) {
            return [];
        }

        return $this->_valueToKeyCombiner($options[ 'except' ]);
    }

}