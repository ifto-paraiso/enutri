<?php

namespace Enutri\Model\Table;

class CentralizacaoProcessosTable extends EnutriTable
{
    /**
     * Inicialização da instância da classe
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Processos'); 
    }
    
    /**
     * Obtém a entidade "CentralizacaoProcesso" com o id especificado
     * 
     * @param  int $centralizacaoProcessoId
     * @param  array $options
     * @return \Enutri\Model\Entity\CentralizacaoProcesso
     */
    public function localizar ($centralizacaoProcessoId, array $options = [])
    {
        $defaultOptions = [];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($centralizacaoProcessoId, $options);
    }
}
