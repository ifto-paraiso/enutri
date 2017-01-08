<?php

namespace Enutri\Model\Table;

class CentralizacoesTable extends EnutriTable
{
    /**
     * Inicialização da instância da classe
     * 
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Exercicios');
        $this->hasMany('CentralizacaoProcessos', [
            'foreignKey' => 'centralizacao_id',
        ]);
    }
    
    public function listar(array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'CentralizacaoProcessos.Processos',
                'Exercicios',
            ],
            'order' => [
                'Exercicios.created DESC',
                'Centralizacoes.created DESC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->find('all', $options);
    }
}
