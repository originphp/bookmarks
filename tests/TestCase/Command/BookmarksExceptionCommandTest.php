<?php
namespace App\Test\Command;

use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;
use Origin\Exception\Exception;

class BookmarksExecptionCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    public function testHelp(){
        $this->exec('bookmarks:exception --help');
        $this->assertExitSuccess();
    }

    public function testExecute(){
        $this->assertTrue(true);
        $this->expectException(Exception::class);
        $this->exec('bookmarks:exception');
    }
}