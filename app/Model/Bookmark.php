<?php

namespace App\Model;

use Origin\Model\Entity;
use ArrayObject;

class Bookmark extends ApplicationModel
{
    /**
     * A list of Categories for dropdown select.
     *
     * @var array
     */
    public $categories = [
      'Business' => 'Business',
      'Computing' => 'Computing',
      'Entertainment' => 'Entertainment',
      'Finance' => 'Finance',
      'Health' => 'Health',
    ];

    public function initialize(array $config)
    {
        parent::initialize($config);

        /**
         * Setup validation rules
         */
        $this->validate('user_id', [
            'rule' => 'notBlank',
            'message' => 'This field is required'
            ]);
        $this->validate('title', 'notBlank');
        $this->validate('url', [
            'notBlank' => [
                'rule'=>'notBlank'
            ],
            'url' => [
                'rule'=>'url',
                'message' => 'Invalid URL'
            ],
        ]);
        
        /**
         * Configure associations
         */
        $this->belongsTo('User');
        $this->hasAndBelongsToMany('Tag');
    }

    public function afterFind($results, ArrayObject $options)
    {
        /*
         * Convert hasAndBelongsToMany tags into string
         */
        if (isset($results->tags)) {
            $results->tag_string = $this->tagsToString($results->tags);
        }

        return $results;
    }

    /**
     * Takes related records and converts to string.
     *
     * @param Origin\Model\Collection $tags
     */
    protected function tagsToString($tags)
    {
        $result = [];
        foreach ($tags as $tag) {
            $result[] = $tag->title;
        }

        return implode(',', $result);
    }

    /**
     * We need to take the tag string and convert this into a format which can be
     * saved. In this case it will be $entity->tags = [$entity1,$entity2]
     *
     * @param Entity $entity
     * @param array $options
     * @return void
     */
    public function beforeSave(Entity $entity, ArrayObject $options)
    {
        if ($entity->has('tag_string')) {
            $entity->tags = [];
            if ($entity->tag_string) {
                $tags = explode(',', $entity->tag_string);
                foreach ($tags as $tag) {
                    $entity->tags[] = $this->Tag->new(['title' => $tag]);
                }
            }
        }
        return true;
    }
}
