<?php

use Bootstrap\Support\Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users

            # columns
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('name', 'string', ['null' => true])
            ->addColumn('email_token', 'string')
            ->addColumn('is_activated', 'boolean', ['default' => false])

            # indexes
            ->addIndex(['email'], ['unique' => true])
            ->addIndex(['name'])
            ->addIndex(['password'])
            ->addIndex(['email_token'])

            # created_at and updated_at
            ->addTimestamps()

            # deleted_at
            ->addSoftDeletes()

            # build the entire table
            ->create();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
