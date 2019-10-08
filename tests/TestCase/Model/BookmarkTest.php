<?php
namespace App\Test\Model;

use Origin\Model\ModelRegistry;
use Origin\TestSuite\OriginTestCase;

/**
 * @property \App\Model\Bookmark $Bookmark
 */
class BookmarkTest extends OriginTestCase
{
    protected $fixtures = ['Bookmark','BookmarksTag','Tag','User'];

    public function startup() : void
    {
        $this->Bookmark = ModelRegistry::get('Bookmark');
    }

    public function testTagsToString()
    {
        $bookmark = $this->Bookmark->get(1000, ['associated' => ['Tag']]);

        $this->assertEquals('New,Top Rated', $bookmark->tag_string);
    }

    public function testStringToTags()
    {
        $bookmark = $this->Bookmark->get(1000, ['associated' => ['Tag']]);
  
        $bookmark = $this->Bookmark->new([
            'title' => 'Google',
            'url' => 'https://www.google.com',
            'category' => 'Test',
            'tag_string' => 'Search Engine,Best',
            'user_id' => 1000,
        ]);
     
        $this->assertTrue($this->Bookmark->save($bookmark));
       
        $this->assertEquals('Search Engine', $bookmark->tags[0]->title);
        $this->assertEquals('Best', $bookmark->tags[1]->title);
    }
}
