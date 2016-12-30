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
        $this->hasMany('Cardapios');
    }
    
    public function listar (Uex $uex = null, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs',
                'Participantes.Exercicios',
                'ProcessoModalidades.Modalidades',
                'Cardapios.CardapioTipos',
                'Cardapios.Atendimentos',
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
    
    /**
     * Retorna as informações do Processo especificado
     * 
     * @param int $processoId
     * @param array $options
     * 
     * @return \Enutri\Model\Entity\Processo;
     */
    public function localizar ($processoId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs',
                'Participantes.Exercicios',
                'ProcessoModalidades.Modalidades',
                'Cardapios.CardapioTipos',
                'Cardapios.Atendimentos',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($processoId, $options);
    }
}
