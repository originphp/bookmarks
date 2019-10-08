<?php
namespace App\Test\Console\Command;

use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;

class BookmarksListCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    protected $fixtures = ['Bookmark','BookmarksTag','Tag','User'];
    
    public function testExecute()
    {
        $this->exec('bookmarks:list');
        
        $this->assertExitSuccess();
        $this->assertOutputContains('Found 2 bookmarks');
    }
}
