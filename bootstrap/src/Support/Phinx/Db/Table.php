<?php
namespace Bootstrap\Support\Phinx\Db;

use Phinx\Db\Table as PhinxTable;

class Table extends PhinxTable
{
    public function addSoftDeletes()
    {
        $this
            ->addColumn('deleted_at', 'timestamp', [
                'null' => true,
            ]);

        return $this;
    }
}
