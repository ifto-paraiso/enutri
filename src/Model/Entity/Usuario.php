<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class Usuario extends Entity
{
    protected function _setSenha($senha)
    {
        if (strlen($senha) > 0) {
            return (new DefaultPasswordHasher())->hash($senha);
        }
    }
}