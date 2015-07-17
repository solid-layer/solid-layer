<?php

// use Phinx\Migration\AbstractMigration;
use Bootstrap\Support\Phinx\Migration\AbstractMigration;

class PasswordHistory extends AbstractMigration
{
    public function up()
    {
        $password_history = $this->table('password_history');

        if (! $this->hasTable('password_history')) {
            $password_history
                ->addColumn('user_id', 'integer')
                ->addColumn('old_password', 'string')
                ->addTimestamps()
                ->create();
        }

        $password_history
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->save();
    }

    public function down()
    {
        $password_history = $this->table('password_history');
        $password_history->dropForeignKey('user_id');

        $this->dropTable('password_history');
    }
}
