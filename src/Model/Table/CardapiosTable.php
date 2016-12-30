<?php

namespace Enutri\Model\Table;

class CardapiosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('CardapioTipos');
        $this->hasMany('Atendimentos');
    }
}
