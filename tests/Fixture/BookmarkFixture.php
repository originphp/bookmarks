<?php
namespace App\Test\Fixture;

use Origin\TestSuite\Fixture;

class BookmarkFixture extends Fixture
{
    /**
     * Fixture will create these records
     *
     * @var array
     */
    protected $records = [
        [
            'id' => 1000,
            'user_id' => 1000,
            'title' => 'OriginPHP',
            'url' => 'https://www.originphp.com',
            'category' => 'Development',
            'description' => 'The best PHP framework',
            'created' => '2019-01-18 09:53:00',
            'modified' => '2019-01-18 09:53:00'
        ],
        [
            'id' => 1001,
            'user_id' => 1000,
            'title' => 'Google',
            'url' => 'https://www.gogle.com',
            'category' => 'Search',
            'description' => 'The most used search engine in the world!',
            'created' => '2019-01-18 09:53:00',
            'modified' => '2019-01-18 09:53:00'
        ]
    ];
}
