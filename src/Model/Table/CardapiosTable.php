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

/**
 * Repositório para manipulação de cardápios
 * 
 */
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
    
    /**
     * Regras de validação default
     * 
     * @param  \Cake\Validation\Validator $validator
     * 
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('cardapio_tipo_id', 'create', 'Informe o tipo do cardápio');
        $validator->requirePresence('nome', 'create', 'Informe um nome para o cardápio');
        
        $validator->notEmpty('cardapio_tipo_id', 'Informe o tipo do cardápio');
        $validator->notEmpty('nome',             'Informe um nome para o cardápio');
        
        return $validator;
    }
    
    /**
     * Localiza o cardápio com o id especificado
     * 
     * @param int   $cardapioId
     * @param array $options
     * 
     * @return \Cake\Datasource\EntityInterface
     */
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
