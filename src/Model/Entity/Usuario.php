<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class Usuario extends Entity
{
    protected $hasher;
    
    public function __construct(array $properties = array(), array $options = array())
    {
        parent::__construct($properties, $options);
        $this->hasher = new DefaultPasswordHasher();
    }

    protected function _setSenha($senha)
    {
        if (strlen($senha) > 0) {
            return $this->hasher->hash($senha);
        }
    }
    
    public function check($senha)
    {
        return $this->hasher->check($senha, $this->senha);
    }
}
