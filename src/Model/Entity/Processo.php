<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

class Processo extends Entity
{
    protected function _getModalidades()
    {
        $modalidades = [];
        foreach ($this->processo_modalidades as $processoModalidade) {
            $modalidades[] = h($processoModalidade->modalidade->nome_reduzido);
        }
        return implode(', ', $modalidades);
    }
}
