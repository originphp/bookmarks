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
        $this->assertEquals('b1797b551f202e462ba64f9e3e6be951', $hash); # 100% text verification
    }
}
