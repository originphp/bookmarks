<?php
use Origin\Migration\Migration;

class CreateBookmarksTagsTableMigration extends Migration
{
    public function change()
    {
        $tableOptions = ['engine' => 'InnoDB', 'collation' => 'utf8mb4_0900_ai_ci','autoIncrement' => 1000];
     
        $this->createJoinTable('bookmarks', 'tags', $tableOptions);

        $this->addForeignKey('bookmarks_tags', 'bookmarks');
        $this->addForeignKey('bookmarks_tags', 'tags');
    }
}
