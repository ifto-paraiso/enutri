<?php

namespace Enutri\Model\Table;

class CardapiosTable extends EnutriTable
{
    /**
     * Inicialização da instância da classe
     * 
     * @param void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('CardapioTipos');
        $this->belongsTo('Processos');
        $this->hasMany('Atendimentos');
        $this->hasMany('Ingredientes');
    }
    
    public function localizar ($cardapioId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Processos.Participantes.Uexs',
                'Processos.Participantes.Exercicios',
                'Processos.ProcessoModalidades.Modalidades',
                'Processos.Cardapios.Atendimentos',
                'CardapioTipos',
                'Atendimentos',
                'Ingredientes.Alimentos.ConsumoMedida',
                'Ingredientes.Alimentos.CompraMedida',
            ]
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($cardapioId, $options);
    }
}
