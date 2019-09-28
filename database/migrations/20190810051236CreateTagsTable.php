<?php
use Origin\Migration\Migration;

class CreateTagsTableMigration extends Migration
{
    public function change() : void
    {
        $tableOptions = ['engine' => 'InnoDB', 'autoIncrement' => 1000];
       
        $this->createTable('tags', [
            'title' => ['type' => 'string', 'limit' => 255, 'null' => false, 'default' => null],
            'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        ], $tableOptions);
       
        $this->addIndex('tags', 'title');
    }
}
