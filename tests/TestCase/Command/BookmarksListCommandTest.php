<?php
namespace App\Test\Command;

use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;

class BookmarksListCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    public $fixtures = ['Bookmark'];
    
    public function testExecute()
    {
        $this->exec('bookmarks:list');
        $this->assertExitSuccess();
        $this->assertOutputContains('Found 1 bookmarks');
    }
}
