<?php
namespace App\Test\Command;

use Origin\TestSuite\OriginTestCase;
use Origin\TestSuite\ConsoleIntegrationTestTrait;

class BookmarksUninstallCommandTest extends OriginTestCase
{
    use ConsoleIntegrationTestTrait;

    public function testExecute(){
        $this->exec('bookmarks:uninstall --dry-run',['yes']);
        $this->assertExitSuccess();
        $hash = md5($this->output());
        $this->assertEquals('9db8924fd261db20ccb183be9bc0338d',$hash); # 100% text verification
    }

}