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
use Cake\Event\Event;
use Cake\Validation\Validator;
use Enutri\Model\Entity\Cardapio;

/**
 * Repositório para manipulação de ingredientes
 * 
 */
class IngredientesTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Alimentos');
        $this->belongsTo('Cardapios');
    }
    
    /**
     * Validação default
     * 
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('alimento_id');
        $validator->requirePresence('quantidade');
        
        $validator->notEmpty('alimento_id');
        $validator->notEmpty('quantidade');
        $validator->numeric('quantidade');
        $validator->range('quantidade', [0.1, 10000]);
        
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
        \Enutri\Model\Formatting\Number::brToFloat($data, [
            'quantidade',
        ]);
    }
    
    public function localizar ($ingredienteId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Cardapios.Processos.Participantes.Uexs',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($ingredienteId, $options);
    }
    
    /**
     * Atualiza a relação de ingredientes do cardápio, criando, excluindo e 
     * alterando os ingredientes conforme a relação $ingredientes 
     * 
     * @param Cardapio $cardapio
     * @param array $ingredientes
     * @return int    
     */
    public function atualizar (Cardapio $cardapio, array $ingredientes = []) 
    {
        $errors = 0;
        
        // Remoção dos ingredientes que não constam na lista de ingredientes
        foreach ($cardapio->ingredientes as $ingredienteExistente) {
            $removido = true;
            foreach ($ingredientes as $ingrediente) {
                if (isset($ingrediente['id']) && $ingrediente['id'] == $ingredienteExistente->id) {
                    $removido = false;
                    break;
                }
            }
            if ($removido) {
                if (!$this->delete($ingredienteExistente)) {
                    $errors++;
                }
            }
        }
        
        // Atualização e cadastro de novos ingredientes
        foreach ($ingredientes as $ingrediente) {
            $ingredienteEditado = $this->newEntity();
            $ingrediente['cardapio_id'] = $cardapio->id;
            $this->patchEntity($ingredienteEditado, $ingrediente);
            if (!$this->save($ingredienteEditado)) {
                $errors++;
            }
        }
        
        return $errors;
    }
}