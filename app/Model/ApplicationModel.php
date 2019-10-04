<?php

namespace App\Model;

use Origin\Model\Concern\Delocalizable;
use Origin\Model\Concern\Timestampable;
use Origin\Model\Model;

class ApplicationModel extends Model
{
    use Delocalizable,Timestampable;

    public function initialize(array $config) : void
    {
    }
}
