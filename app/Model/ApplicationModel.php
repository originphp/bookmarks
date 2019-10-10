<?php

namespace App\Model;

use Origin\Model\Model;
use Origin\Model\Concern\Delocalizable;
use Origin\Model\Concern\Timestampable;

class ApplicationModel extends Model
{
    use Delocalizable,Timestampable;

    protected function initialize(array $config) : void
    {
    }
}
