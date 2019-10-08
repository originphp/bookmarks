<?php
namespace App\Test\Fixture;

use Origin\TestSuite\Fixture;

class BookmarksTagFixture extends Fixture
{
    protected $records = [
        [
            'bookmark_id' => 1000,
            'tag_id' => 1000,
        ],
        [
            'bookmark_id' => 1000,
            'tag_id' => 1001,
        ],

    ];
}
