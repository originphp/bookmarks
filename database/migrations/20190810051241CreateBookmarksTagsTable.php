<?php
use Origin\Migration\Migration;

class CreateBookmarksTagsTableMigration extends Migration
{
    public function change() : void
    {
        $tableOptions = ['engine' => 'InnoDB','autoIncrement' => 1000];
     
        $this->createJoinTable('bookmarks', 'tags', $tableOptions);

        $this->addForeignKey('bookmarks_tags', 'bookmarks');
        $this->addForeignKey('bookmarks_tags', 'tags');
    }
}
