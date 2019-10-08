<?php
namespace App\Console\Command;

use Origin\Exception\Exception;
use Origin\Console\Command\Command;

class BookmarksExceptionCommand extends Command
{
    protected $name = 'bookmarks:exception';

    protected $description = 'This is going to generate an exception to display the pretty exception handling';

    public function initialize() : void
    {
    }
 
    public function execute() : void
    {
        throw new Exception('Freeze!!'); // On purpose
    }
}
