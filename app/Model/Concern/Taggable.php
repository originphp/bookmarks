<?php
namespace App\Model\Concern;

use ArrayObject;
use Origin\Model\Entity;
use Origin\Model\Collection;

trait Taggable
{
    /**
     * Initialization method, here you can register callbacks or configure model associations
     *
     * @return void
     */
    protected function initializeTaggable() : void
    {
        // register callbacks
        $this->afterFind('convertTagsToString');
        $this->beforeSave('convertTagsToArray');
    }

    /**
    * Takes related records and converts to string.
    *
    * @param \Origin\Model\Collection $tags
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
     * After find callback
     *
     * @param \Origin\Model\Collection $results
     * @param ArrayObject $options
     * @return void
     */
    protected function convertTagsToString(Collection $results, ArrayObject $options) : void
    {
        /*
        * Convert hasAndBelongsToMany tags into string
        */
        foreach ($results as $result) {
            $result->tag_string = $result->tags ? $this->tagsToString($result->tags) : null;
        }
    }

    /**
     * We need to take the tag string and convert this into a format which can be
     * saved. In this case it will be $entity->tags = [$entity1,$entity2]
     *
     * @param \Origin\Model\Entity $entity
     * @param array $options
     * @return bool
     */
    protected function convertTagsToArray(Entity $entity, ArrayObject $options) : bool
    {
        $entity->tags = [];
        if ($entity->tag_string) {
            $tags = explode(',', $entity->tag_string);
            foreach ($tags as $tag) {
                $entity->tags[] = new Entity(['title' => $tag], ['name' => 'Tag']);
            }
        }

        return true;
    }
}
