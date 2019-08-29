<?php
use Origin\Migration\Migration;

class CreateTagsTableMigration extends Migration
{
    public function change()
    {
        $tableOptions = ['engine' => 'InnoDB', 'collation' => 'utf8mb4_0900_ai_ci','autoIncrement' => 1000];
       
        $this->createTable('tags', [
            'title' => ['type' => 'string', 'limit' => 255, 'null' => false, 'default' => null],
            'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        ], $tableOptions);
       
        $this->addIndex('tags', 'title');
    }
}
