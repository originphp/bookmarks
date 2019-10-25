<?php
namespace App\Console\Command;

use Origin\Yaml\Yaml;
use Origin\Console\Command\Command;

class BookmarksListCommand extends Command
{
    protected $name = 'bookmarks:list';

    protected $description = 'List the available bookmarks';

    protected function initialize() : void
    {
        $this->loadModel('Bookmark');
    }
 
    public function execute() : void
    {
        $bookmarks = $this->Bookmark->find('all');
        
        $this->io->title('Bookmarks');

        foreach ($bookmarks as $bookmark) {
            $this->io->heading('Bookmark', 'cyan');
            $data = Yaml::fromArray($bookmark->toArray());
            $this->out("<white>{$data}</white>");
        }

        $this->io->success(sprintf('Found %d bookmarks', count($bookmarks)));
    }
}
