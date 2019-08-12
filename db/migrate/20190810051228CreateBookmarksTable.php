<?php
use Origin\Migration\Migration;

class CreateBookmarksTableMigration extends Migration
{
    public function change()
    {
        $tableOptions = ['engine' => 'InnoDB', 'collation' => 'utf8mb4_0900_ai_ci','autoIncrement' => 1000];
       
        $this->createTable('bookmarks', [
            'user_id' => ['type' => 'integer', 'limit' => 11, 'unsigned' => false, 'null' => false, 'default' => null],
            'title' => ['type' => 'string', 'limit' => 50, 'null' => false, 'default' => null],
            'description' => ['type' => 'text', 'null' => true, 'default' => null],
            'url' => ['type' => 'text', 'null' => true, 'default' => null],
            'category' => ['type' => 'string', 'limit' => 80, 'null' => true, 'default' => null],
            'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        ], $tableOptions);

        $this->addIndex('bookmarks', 'user_id');
        $this->addForeignKey('bookmarks', 'users');
    }
}
