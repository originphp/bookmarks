<?php
namespace App\Test\Command;

use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;

class BookmarksListCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    public function testExecute(){
        $this->exec('bookmarks:list');
        $this->assertExitSuccess();
        $this->assertOutputContains('Found 2 bookmarks');
    }
}