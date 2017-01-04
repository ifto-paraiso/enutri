<?php

namespace Enutri\Model\Table;

class IngredientesTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Alimentos');
        $this->belongsTo('Cardapios');
    }
    
    public function localizar ($ingredienteId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Cardapios.Processos.Participantes.Uexs',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($ingredienteId, $options);
    }
}