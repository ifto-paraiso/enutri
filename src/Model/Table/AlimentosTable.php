<?php

namespace Enutri\Model\Table;

class AlimentosTable extends EnutriTable
{
    /**
     * Retorna a listagem de alimentos cadastrados ordenados pelo nome
     * 
     * @return Cake\ORM\Query
     */
    public function listar()
    {
        return $this->find('all', [
            'order' => 'Alimentos.nome ASC',
        ]);
    }
}