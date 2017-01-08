<?php

namespace Enutri\Model\Table;

use ArrayObject;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Enutri\Model\Util\Sanitize;

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
     * Regras de validação
     * 
     * @param Validator $validator
     * 
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('ano', 'create', 'Informe o ano');
        $validator->requirePresence('responsavel_nome', 'create', 'Informe o nome do responsável');
        $validator->requirePresence('responsavel_funcao', 'create', 'Informe a função do responsável');
        
        $validator->notEmpty('ano', 'Informe o ano');
        $validator->notEmpty('responsavel_nome', 'Informe o nome do responsável');
        $validator->notEmpty('responsavel_funcao', 'Informe a função do responsável');
        
        $validator->numeric('ano', 'Ano inválido');
        $validator->range('ano', [2000, 2100], 'Ano inválido');
        
        $validator->add('ano', 'uniqueAno', [
            'rule' => 'validateUnique',
            'provider' => 'table',
            'message' => 'Exerício existente'
        ]);
        
        return $validator;
    }
    
    /**
     * Operações realizadas antes da validação dos dados
     * 
     * @param Event $event
     * @param ArrayObject $data
     * @param ArrayObject $options
     * 
     * @return void
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        Sanitize::trimFields($data, [
            'ano',
            'responsavel_nome',
            'responsavel_funcao',
        ]);
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
            'order' => [
                'Exercicios.ano ASC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->find('all', $options);
    }
    
    /**
     * Retorna as informações de um Exercício
     * 
     * @param int $exercicioId
     * @param array $options
     * 
     * @return \Cake\Datasource\EntityInterface
     */
    public function localizar($exercicioId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($exercicioId, $options);
    }
}
