<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

namespace Enutri\Model\Table;

use ArrayObject;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Enutri\Model\Util\Sanitize;

/**
 * Repositório para manipulação de exercícios
 * 
 */
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
        
        $this->displayField('ano');
        
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
    
    /**
     * Obtém um array associativo (id => Ano) com a relação de Exercícios 
     * cadastrados. Util para ser usado em selects
     * 
     * @param array $options
     * @return array
     */
    public function getList (array $options = [])
    {
        $defaultOptions = [
            'order' => [
                'Exercicios.created DESC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->find('list', $options)->toArray();
    }
}
