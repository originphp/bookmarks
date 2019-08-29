<?php
namespace App\Command;
use Origin\Command\Command;
use Origin\Exception\Exception;

class BookmarksExceptionCommand extends Command
{
    protected $name = 'bookmarks:exception';

    protected $description = 'This is going to generate an exception to display the pretty exception handling';

    public function initialize(){

    }
 
    public function execute(){
       throw new Exception('Freeze!!'); // On purpose
    }
}