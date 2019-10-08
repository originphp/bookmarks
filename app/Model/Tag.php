<?php

namespace App\Model;

class Tag extends ApplicationModel
{
    protected $displayField = 'title';

    public function initialize(array $config) : void
    {
        parent::initialize($config);
        $this->hasAndBelongsToMany('Bookmark');
    }
}
