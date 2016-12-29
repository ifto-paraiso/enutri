<?php

namespace Enutri\Model\Table;

use Enutri\Model\Entity\Uex;

class ProcessosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Participantes');
        $this->hasMany('ProcessoModalidades');
    }
    
    public function listar (Uex $uex = null, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs',
                'Participantes.Exercicios',
                'ProcessoModalidades.Modalidades',
            ],
            'order' => [
                'Processos.created DESC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        if ($uex !== null) {
            $options['conditions'][] = [
                'Participantes.uex_id' => $uex->id,
            ];
        }
        return $this->find('all', $options);
    }
}
