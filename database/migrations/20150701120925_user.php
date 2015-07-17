<?php

// use Phinx\Migration\AbstractMigration;
use Bootstrap\Support\Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users
            ->addColumn('email', 'string')
            ->addColumn('username', 'string')
            ->addColumn('password', 'string')
            ->addColumn('first_name', 'string', ['null' => true])
            ->addColumn('last_name', 'string', ['null' => true])
            ->addColumn('token', 'string')
            ->addColumn('is_activated', 'boolean', ['default' => false])
            ->addIndex(['email'], ['unique' => true])
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['first_name'])
            ->addIndex(['last_name'])
            ->addIndex(['token'])
            ->addTimestamps()
            ->create();
    }


    public function down()
    {
        $this->dropTable('users');
    }
}
