<?php

namespace App\Model;

use Origin\Model\Model;
use Origin\Model\Entity;

class ApplicationModel extends Model
{
    public function initialize(array $config) : void
    {
        $this->loadBehavior('Timestamp');
        $this->loadBehavior('Delocalize');
    }
}
