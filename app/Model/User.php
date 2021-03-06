<?php

namespace App\Model;

use ArrayObject;
use Origin\Model\Entity;
use Origin\Utility\Security;

class User extends ApplicationModel
{
    protected function initialize(array $config) : void
    {
        parent::initialize($config);
 
        $this->validate('name', 'required');
        $this->validate('email', [
            'required','email'
        ]);
        $this->validate('password', [
            ['rule' => 'required','on' => 'create'],
            ['rule' => 'alphaNumeric', 'message' => 'Alphanumeric characters only'],
            ['rule' => ['minLength', 6], 'message' => 'Min 6 characters'],
            ['rule' => ['maxLength', 8], 'message' => 'Max 8 characters'],
        ]);
        $this->validate('dob', 'date');

        $this->hasMany('Bookmark');

        $this->beforeSave('hashUserPassword');
    }

    /**
     * Hash the using the default password_hasher which is what the Auth component uses
     * aswell. Default is blowfish and is considered the most secure. Length will be 60 but
     * to allow for changes in PHP going forward with strong algos, use 255.
     *
     * @param \Origin\Model\Entity $entity
     * @param ArrayObject $options
     * @return bool
     */
    public function hashUserPassword(Entity $entity, ArrayObject $options) : bool
    {
        if (! empty($entity->password)) {
            $entity->password = Security::hashPassword($entity->password);
        }

        return true;
    }
}
