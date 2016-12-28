<?php

namespace Enutri\Model\Table;

class ParticipantesTable extends EnutriTable
{
    /**
     * Inicialização da classe
     * 
     * @param array $config
     * 
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Uexs');
        $this->belongsTo('Exercicios');
    }
}