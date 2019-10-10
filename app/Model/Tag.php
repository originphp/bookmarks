<?php

namespace App\Model;

class Tag extends ApplicationModel
{
    protected $displayField = 'title';

    protected function initialize(array $config) : void
    {
        parent::initialize($config);
        $this->hasAndBelongsToMany('Bookmark');
    }
}
