<?php
use Origin\Model\Schema;

class QueueSchema extends Schema
{
    const VERSION = 20190821104733;

    /**
     * Schema
     *
     * @var array
     */
    public $queue = [
        'columns' => [
            'id' => ['type' => 'integer', 'limit' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true],
            'queue' => ['type' => 'string', 'limit' => 80, 'null' => false, 'default' => null],
            'data' => ['type' => 'text', 'null' => false, 'default' => null],
            'status' => ['type' => 'string', 'limit' => 40, 'null' => false, 'default' => null],
            'locked' => ['type' => 'boolean', 'null' => true, 'default' => false],
            'tries' => ['type' => 'integer', 'limit' => 1, 'unsigned' => false, 'null' => true, 'default' => 0],
            'scheduled' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
            'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
        ],
        'constraints' => [
            'primary' => ['type' => 'primary', 'column' => 'id'],
        ],
        'indexes' => [
            'queue_index' => ['type' => 'index', 'column' => 'queue'],
            'status_index' => ['type' => 'index', 'column' => 'status'],
        ],
        'options' => ['engine' => 'InnoDB', 'collation' => 'utf8mb4_0900_ai_ci','autoIncrement' => 1000],
    ];
}
