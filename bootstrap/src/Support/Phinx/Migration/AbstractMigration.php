<?php

namespace Bootstrap\Support\Phinx\Migration;

use Bootstrap\Support\Phinx\Db\Table;
use Phinx\Migration\AbstractMigration as PhinxAbstractMigration;

class AbstractMigration extends PhinxAbstractMigration
{
    public function table($tableName, $options = [])
    {
        return new Table($tableName, $options, $this->getAdapter());
    }
}
