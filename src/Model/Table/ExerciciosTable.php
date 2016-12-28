<?php

namespace Enutri\Model\Table;

class ExerciciosTable extends EnutriTable
{
    /**
     * Inicialização da classe
     * 
     * @param array $config
     * 
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->hasMany('Participantes');
        return $config;
    }
    
    /**
     * Retorna a listagem de Exercícios cadastrados
     * 
     * @param array $options
     * 
     * @return type
     */
    public function listar(array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->find('all', $options);
    }
}