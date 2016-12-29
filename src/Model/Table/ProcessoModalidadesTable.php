<?php

namespace Enutri\Model\Table;

class ProcessoModalidadesTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Modalidades');
    }
}
