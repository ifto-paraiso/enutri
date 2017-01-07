<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

class Ingrediente extends Entity
{
    protected function _getNomeFull()
    {
        if ($this->observacoes !== '') {
            return sprintf('%s (%s)', $this->alimento->nome, $this->observacoes);
        }
        return $this->alimento->nome;
    }
    
    public function getNutriente($nutrienteAlias)
    {
        if (isset($this->alimento->{$nutrienteAlias})) {
            return $this->alimento->{$nutrienteAlias} / 100.0 * $this->quantidade;
        }
        return 0.0;
    }
}
