<?php

namespace Enutri\Model\Table;

class AtendimentosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Cardapios');
    }
    
    public function localizar ($atendimentoId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Cardapios.Processos.Participantes.Uexs',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($atendimentoId, $options);
    }
}