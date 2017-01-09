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
    
    /**
     * Obtém a lista de centralizações cadastradas
     * 
     * @param array $options
     * @return \Cake\ORM\Query
     */
    public function listar(array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'CentralizacaoProcessos' => [
                    'Processos',
                ],
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
    
    /**
     * Obtém uma entidade com as informações da centralização especificada
     * 
     * @param int $centralizacaoId
     * @param array $options
     * @return \Enutri\Model\Entity\Centralizacao
     */
    public function localizar($centralizacaoId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Exercicios',
                'CentralizacaoProcessos' => [
                    'Processos' => [
                        'ProcessoModalidades' => [
                            'Modalidades',
                        ],
                        'Cardapios' => [
                            'Atendimentos',
                            'Ingredientes' => [
                                'Alimentos',
                            ],
                        ],
                        'Participantes' => [
                            'Uexs',
                        ],
                    ],
                ],
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($centralizacaoId, $options);
    }
}
