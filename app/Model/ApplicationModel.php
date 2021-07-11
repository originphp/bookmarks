<?php
declare(strict_types = 1);
namespace App\Model;

use ArrayObject;
use Origin\Model\Collection;
use Origin\Model\Model;
use Origin\Model\Concern\Delocalizable;
use Origin\Model\Concern\Timestampable;

class ApplicationModel extends Model
{
    use Delocalizable;
    use Timestampable;

    protected function initialize(array $config) : void
    {
    }

    /**
     * Overides the default behavior, always returns a Collection. In
     * the next major version this will be the expected behavior.
     *
     * @param ArrayObject $options
     * @return Collection
     */
    protected function finderAll(ArrayObject $options) : Collection
    {
        $result = parent::finderAll($options);
        return $result ?: new Collection([]);
    }
}
