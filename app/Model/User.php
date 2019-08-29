<?php

namespace App\Model;

use Origin\Model\Entity;
use Origin\Utility\Security;

class User extends AppModel
{
    public function initialize(array $config)
    {
        parent::initialize($config);
 
        $this->validate('name', 'notBlank');
        $this->validate('email', [
            ['rule' => 'notBlank'],
            ['rule' => 'email'],
        ]);
        $this->validate('password', [
            ['rule' => 'notBlank'],
            ['rule' => 'alphaNumeric', 'message' => 'Alphanumeric characters only'],
            ['rule' => ['minLength', 6], 'message' => 'Min 6 characters'],
            ['rule' => ['maxLength', 8], 'message' => 'Max 8 characters'],
        ]);
        $this->validate('dob', 'date');

        $this->hasMany('Bookmark');
    }

    /**
     * Hash the using the default password_hasher which is what the Auth component uses
     * aswell. Default is blowfish and is considered the most secure. Length will be 60 but
     * to allow for changes in PHP going forward with strong algos, use 255.
     *
     * @param Entity $entity
     * @param array  $options
     */
    public function beforeSave(Entity $entity, array $options = [])
    {
        if (!empty($entity->password)) {
            $entity->password = Security::hashPassword($entity->password);
        }

        return true;
    }
}
