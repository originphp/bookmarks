<?php

namespace App\Model;

use App\Model\Concern\Taggable;

class Bookmark extends ApplicationModel
{
    use Taggable;
    
    /**
     * A list of Categories for dropdown select.
     *
     * @var array
     */
    protected $categories = [
        'Business' => 'Business',
        'Computing' => 'Computing',
        'Entertainment' => 'Entertainment',
        'Finance' => 'Finance',
        'Health' => 'Health',
    ];

    protected function initialize(array $config) : void
    {
        parent::initialize($config);
      
        /**
         * Setup validation rules
         */
        $this->validate('user_id', [
            'required',
            'message' => 'This field is required'
        ]);
        $this->validate('title', 'required');
        $this->validate('url', [
            'required',
            'url' => [
                'rule' => 'url',
                'message' => 'Invalid URL'
            ],
        ]);
        
        /**
         * Configure associations
         */
        $this->belongsTo('User');
        $this->hasAndBelongsToMany('Tag');
    }

    public function categories() : array
    {
        return $this->categories;
    }
}
