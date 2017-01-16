<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Enutri\Model\Entity\Uex;

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
    
    /**
     * Verifica se o usuário está lotado na UEx especificada
     * 
     * @param Uex $uex
     * 
     * @return boolean True, se o usuário estiver lotado na UEx, ou se ele
     *                 não tiver nenhuma lotação (acesso geral).
     */
    public function lotado (Uex $uex)
    {
        if (count($this->lotacoes) == 0) {
            return true;
        }
        foreach ($this->lotacoes as $lotacao) {
            if ($lotacao->uex_id == $uex->id) {
                return true;
            }
        }
        return false;
    }
}
