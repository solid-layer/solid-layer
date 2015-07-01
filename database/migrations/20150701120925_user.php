<?php

use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users
            ->addColumn('username', 'string')
            ->addColumn('password', 'string')
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['first_name'])
            ->addIndex(['last_name'])
            ->addTimestamps()
            ->create();
    }


    public function down()
    {
        $this->dropTable('users');
    }
}
