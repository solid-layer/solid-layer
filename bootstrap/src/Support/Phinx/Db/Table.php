<?php

namespace Bootstrap\Support\Phinx\Db;

use Phinx\Db\Table as PhinxTable;

class Table extends PhinxTable
{
    public function addTimestamps()
    {
        $this
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP'
            ])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP', 
                'update' => 'CURRENT_TIMESTAMP',
            ]);

        return $this;
    }
}