<?php

namespace Enutri\Model\Table;

class LotacoesTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Uexs');
        $this->belongsTo('Usuarios');
    }
    
    public function localizar($lotacaoId)
    {
        return $this->get($lotacaoId, [
            'contain' => [
                'Uexs',
                'Usuarios',
            ]
        ]);
    }
}