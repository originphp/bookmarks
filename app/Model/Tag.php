<?php

namespace App\Model;

class Tag extends ApplicationModel
{
    public $displayField = 'title';

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->hasAndBelongsToMany('Bookmark');
    }
}
