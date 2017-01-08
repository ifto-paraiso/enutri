<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

class Centralizacao extends Entity
{
    protected function _getQtdeProcessos()
    {
        return count($this->centralizacao_processos);
    }
}