<?php
namespace App\Command;
use Origin\Command\Command;
use Origin\Utility\Yaml;

class BookmarksListCommand extends Command
{
    protected $name = 'bookmarks:list';

    protected $description = 'List the available bookmarks';

    public function initialize() : void
    {
        $this->loadModel('Bookmark');
    }
 
    public function execute() : void
    {
        
        $bookmarks = $this->Bookmark->find('all');
        
        $this->io->title('Bookmarks');

        foreach($bookmarks as $bookmark){
            $this->io->heading('Bookmark','cyan');
            $data = Yaml::fromArray($bookmark->toArray());
            $this->out("<white>{$data}</white>");
        }

        $this->io->success(sprintf('Found %d bookmarks',count($bookmarks)));
       
    }
}