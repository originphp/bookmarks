<?php
namespace App\Console\Command;

use Origin\Console\Command\Command;

class BookmarksUninstallCommand extends Command
{
    private $files = [
        APP . DS . 'Console' . DS . 'Command' . DS  . 'BookmarksExceptionCommand.php',
        APP . DS . 'Console' . DS . 'Command' . DS  . 'BookmarksListCommand.php',
        APP . DS . 'Console' . DS . 'Command' . DS  . 'BookmarksUninstallCommand.php',
        APP . DS . 'Http' . DS . 'Controller' . DS  . 'BookmarksController.php',
        APP . DS . 'Http' . DS . 'Controller' . DS  . 'UsersController.php',
        APP . DS . 'Model' . DS  . 'Bookmark.php',
        APP . DS . 'Model' . DS  . 'Tag.php',
        APP . DS . 'Model' . DS  . 'User.php',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Bookmarks'. DS . 'add.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Bookmarks'. DS . 'edit.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Bookmarks'. DS . 'index.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Bookmarks'. DS . 'view.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Users'. DS . 'add.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Users'. DS . 'edit.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Users'. DS . 'index.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Users'. DS . 'view.ctp',
        APP . DS . 'Http' . DS . 'View' . DS  . 'Users'. DS . 'login.ctp',
        ROOT . DS . 'tests' . DS . 'Fixture' . DS  . 'BookmarkFixture.php',
        ROOT . DS . 'tests' . DS . 'Fixture' . DS  . 'BookmarksTagFixture.php',
        ROOT . DS . 'tests' . DS . 'Fixture' . DS  . 'UserFixture.php',
        ROOT . DS . 'tests' . DS . 'Fixture' . DS  . 'TagFixture.php',
        ROOT . DS . 'tests' . DS . 'TestCase' . DS  . 'Http' . DS . 'Controller' .DS . 'BookmarksControllerTest.php',
        ROOT . DS . 'tests' . DS . 'TestCase' . DS  . 'Model' . DS . 'BookmarkTest.php',
        ROOT . DS . 'tests' . DS . 'TestCase' . DS  . 'Console' . DS . 'Command' .DS . 'BookmarksExceptionCommandTest.php',
        ROOT . DS . 'tests' . DS . 'TestCase' . DS  . 'Console' . DS . 'Command' .DS . 'BookmarksListCommandTest.php',
        ROOT . DS . 'tests' . DS . 'TestCase' . DS  . 'Console' . DS . 'Command' .DS . 'BookmarksUninstallCommandTest.php',
    ];

    protected $name = 'bookmarks:uninstall';
    protected $description = 'Uninstalls the Bookmarks application';

    protected function initialize() : void
    {
        $this->addOption('dry-run', [
            'type' => 'boolean',
            'description' => 'Does not delete, just checks files and folders exists']);
    }

    public function execute() : void
    {
        $this->out('The following files will deleted:');
        $this->out('');

        foreach ($this->files as $file) {
            $this->out('<yellow> '. $file .'</yellow>');
        }
       
        $result = $this->io->askChoice('Are you sure?', ['yes','no'], 'no');
        if ($result === 'yes') {
            $this->out('');
            $this->out('Deleting Files');
            $this->out('');
            foreach ($this->files as $file) {
                if ($this->delete($file)) {
                    $this->io->status('ok', $file);
                } else {
                    $this->io->status('error', $file);
                }
            }
            $this->out('');
            $this->out('Deleting Folders');
            $this->out('');

            foreach ([APP . DS . 'View' . DS . 'Bookmarks', APP . DS . 'View' . DS . 'Users'] as $folder) {
                if ($this->rmdir($folder)) {
                    $this->io->status('ok', $folder);
                } else {
                    $this->io->status('error', $folder);
                }
            }
        }
    }
    
    private function delete(string $filename)
    {
        if (! file_Exists($filename)) {
            return false;
        }
        if ($this->options('dry-run')) {
            return true;
        }

        return unlink($filename);
    }

    private function rmdir(string $folder)
    {
        if (! file_exists($folder)) {
            return false;
        }
        if ($this->options('dry-run')) {
            return true;
        }

        return rmdir($folder);
    }
}
