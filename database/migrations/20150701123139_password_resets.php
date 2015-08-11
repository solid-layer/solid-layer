<?php

use Bootstrap\Support\Phinx\Migration\AbstractMigration;

class PasswordResets extends AbstractMigration
{
    public function up()
    {
        $password_resets = $this->table('password_resets');

        if (!$this->hasTable('password_resets')) {

            $password_resets
                # columns
                ->addColumn('user_id', 'integer')
                ->addColumn('reset_token', 'string')

                # indexes
                ->addIndex(['reset_token'], ['unique' => true])

                # created_at and updated_at
                ->addTimestamps()

                # deleted_at
                ->addSoftDeletes()

                # build the entire table
                ->create();
        }

        $password_resets
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->save();
    }

    public function down()
    {
        $password_resets = $this->table('password_resets');
        $password_resets->dropForeignKey('user_id');

        $this->dropTable('password_resets');
    }
}
