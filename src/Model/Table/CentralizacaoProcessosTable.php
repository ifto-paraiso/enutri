<?php

namespace Enutri\Model\Table;

class CentralizacaoProcessosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Processos'); 
    }
}
