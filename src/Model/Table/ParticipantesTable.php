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
use Enutri\Model\Entity\Uex;

/**
 * Repositório para manipulação de participantes de um exercício
 * 
 */
class ParticipantesTable extends EnutriTable
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
        $this->belongsTo('Uexs');
        $this->belongsTo('Exercicios');
    }
    
    /**
     * Regras de validação default
     * 
     * @param Validator $validator
     * 
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('exercicio_id',       'create', 'Informe o Exercício');
        $validator->requirePresence('uex_id',             'create', 'Informe a UEx');
        $validator->requirePresence('responsavel_nome',   'create', 'Informe o nome do responsável');
        $validator->requirePresence('responsavel_funcao', 'create', 'Informe a função do responsável');
        
        $validator->requirePresence('responsavel_nome',   'Informe o nome do responsável');
        $validator->requirePresence('responsavel_funcao', 'Informe a função do responsável');
        
        return $validator;
    }
    
    /**
     * Operações a serem realizadas antes da validação dos dados
     * 
     * @param Event $event
     * @param ArrayObject $data
     * @param ArrayObject $options
     * 
     * @return void
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        \Enutri\Model\Util\Sanitize::trimFields($data, [
            'responsavel_nome',
            'responsavel_funcao',
        ]);
    }
    
    /**
     * Localiza o Participante com o id especificado
     * 
     * @param int $participanteId
     * @param array $options
     * 
     * @return \Cake\Datasource\EntityInterface
     */
    public function localizar($participanteId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Uexs',
                'Exercicios',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        
        return $this->get($participanteId, $options);
    }
    
    public function getList (Uex $uex = null, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Exercicios',
            ],
            'order' => [
                'Exercicios.created DESC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        if ($uex !== null) {
            $options['conditions']['Participantes.uex_id'] = $uex->id;
        }
        $participantes = $this->find('all', $options);
        $list = [];
        foreach ($participantes as $participante) {
            $list[$participante->id] = $participante->exercicio->ano;
        }
        return $list;
    }
}
