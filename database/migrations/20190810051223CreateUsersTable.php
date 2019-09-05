<?php
use Origin\Migration\Migration;

class CreateUsersTableMigration extends Migration
{
    public function change()
    {
        $tableOptions = ['engine' => 'InnoDB','autoIncrement' => 1000];
        
        $this->createTable('users', [
            'name' => ['type' => 'string', 'limit' => 120, 'null' => false, 'default' => null],
            'email' => ['type' => 'string', 'limit' => 255, 'null' => false, 'default' => null],
            'password' => ['type' => 'string', 'limit' => 255, 'null' => false, 'default' => null],
            'dob' => ['type' => 'date', 'null' => true, 'default' => null],
            'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'api_token' => ['type' => 'string', 'limit' => 40, 'null' => true, 'default' => null],
        ], $tableOptions);

        $this->addIndex('users', 'email');
    }
}
