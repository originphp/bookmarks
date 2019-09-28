<?php
namespace App\Test\Console\Command;

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
        $this->assertEquals('3f2a3b7f7817fb055e760a2b0b07f96b', $hash); # 100% text verification
    }
}
