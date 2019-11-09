<?php
namespace App\Test\Console\Command;

use Origin\Core\Exception\Exception;
use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;

class BookmarksExceptionCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    public function testHelp()
    {
        $this->exec('bookmarks:exception --help');
        $this->assertExitSuccess();
    }

    public function testExecute()
    {
        $this->assertTrue(true);
        $this->expectException(Exception::class);
        $this->exec('bookmarks:exception');
    }
}
