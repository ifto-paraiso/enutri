<?php

namespace Enutri\Model\Table;

class LotacoesTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Uexs');
    }
}