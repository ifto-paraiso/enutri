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

use Cake\Validation\Validator;
use Cake\Event\Event;
use Enutri\Model\Formatting\Number;
use Enutri\Model\Entity\Alimento;
use ArrayObject;

/**
 * Repositório para manipulação de Alimentos
 * 
 */
class AlimentosTable extends EnutriTable
{
    /**
     * Inicialização da classe
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->displayField('nome');
        
        $this->belongsTo('ConsumoMedida', [
            'foreignKey' => 'consumo_medida_id',
            'className'  => 'Medidas',
        ]);
        $this->belongsTo('CompraMedida', [
            'foreignKey' => 'compra_medida_id',
            'className'  => 'Medidas',
        ]);
    }
    
    /**
     * Regras de validação default
     * 
     * @param Cake\Validation\Validator $validator
     * @return Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('nome', 'create', 'Informe o nome do alimento');
        $validator->requirePresence('consumo_medida_id', 'create', 'Informe a unidade de medida');
        $validator->requirePresence('compra_medida_id', 'create', 'Informe a unidade de medida');
        
        $validator->notEmpty('nome', 'Preencha o nome do alimento');
        $validator->notEmpty('consumo_medida_id', 'Informe a unidade de medida');
        
        $validator->numeric('fator', 'Valor inválido');
        $validator->numeric('kcal',  'Valor inválido');
        $validator->numeric('cho',   'Valor inválido');
        $validator->numeric('ptn',   'Valor inválido');
        $validator->numeric('lip',   'Valor inválido');
        $validator->numeric('ca',    'Valor inválido');
        $validator->numeric('fe',    'Valor inválido');
        $validator->numeric('mg',    'Valor inválido');
        $validator->numeric('zn',    'Valor inválido');
        $validator->numeric('vita',  'Valor inválido');
        $validator->numeric('vitc',  'Valor inválido');
        
        return $validator;
    }
    
    /**
     * Operações a serem realizadas antes da validação dos dados
     * 
     * @param Event $event
     * @param ArrayObject $data
     * @param ArrayObject $options
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        Number::brToFloat($data, [
            'fator',
            'kcal',
            'cho',
            'ptn',
            'lip',
            'ca',
            'fe',
            'mg',
            'zn',
            'vita',
            'vitc',
        ]);
    }
    
    /**
     * Retorna a listagem de alimentos cadastrados ordenados pelo nome
     * 
     * @return Cake\ORM\Query
     */
    public function listar()
    {
        return $this->find('all', [
            'order' => 'Alimentos.nome ASC',
            'conditions' => [
                'Alimentos.deleted' => false,
            ]
        ]);
    }
    
    /**
     * Retorna o alimento com o id especificado
     * 
     * @param int $alimentoId
     * @return type
     */
    public function localizar($alimentoId)
    {
        return $this->get($alimentoId, [
            'contain' => [
                'ConsumoMedida',
                'CompraMedida',
            ],
            'conditions' => [
                'Alimentos.deleted' => false,
            ]
        ]);
    }
    
    public function excluir(Alimento $alimento)
    {
        $alimento->deleted = true;
        return $this->save($alimento);
    }
    
    /**
     * Obtém um array com a relação de alimentos para popular selects
     * 
     * @param array $options
     * 
     * @return array
     */
    public function getList (array $options = [])
    {
        $defaultOptions = [
            'conditions' => [
                'Alimentos.deleted' => false,
            ],
            'order' => [
                'Alimentos.nome ASC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->find('list', $options)->toArray();
    }
}
