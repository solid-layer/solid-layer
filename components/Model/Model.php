<?php

namespace Components\Model;

use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model as BaseModel;

class Model extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public function beforeValidationOnCreate()
    {
        $metadata = $this->getModelsMetaData();
        $defaults = $metadata->getDefaultValues($this);
        $attributes = $metadata->getNotNullAttributes($this);

        # set all not null fields to their default value.
        foreach ($attributes as $field) {
            if (
                isset($this->{$field}) ||       # if value already set, continue
                ! is_null($this->{$field}) ||   # if not null, continue
                ! isset($defaults[$field])      # if not in the defaults, continue
            ) {
                continue;
            }

            $this->{$field} = new RawValue($defaults[$field]);
        }
    }
}
