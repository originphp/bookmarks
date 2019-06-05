<?php
namespace App\Test\Command;

use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;

class BookmarksUninstallCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    public function testExecute()
    {
        $this->exec('bookmarks:uninstall --dry-run', ['yes']);
        $this->assertExitSuccess();
        $hash = md5($this->output());
        $this->assertEquals('92a761400b6d7808d5829184ab060bca', $hash); # 100% text verification
    }
}
