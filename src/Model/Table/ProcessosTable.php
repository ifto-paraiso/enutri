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
use Enutri\Model\Entity\Usuario;
use Enutri\Model\Entity\Processo;
use Enutri\Model\Entity\Exercicio;
use Enutri\Model\Util\Sanitize;

/**
 * Repositório para manipulação de processos
 * 
 */
class ProcessosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Participantes');
        $this->hasMany('ProcessoModalidades');
        $this->hasMany('Cardapios');
        $this->belongsTo('AprovadorUsuario', [
            'foreignKey' => 'aprovador_usuario_id',
            'className'  => 'Usuarios',
        ]);
    }
    
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('participante_id', 'create', 'Informe o Exercício');
        $validator->requirePresence('nome',            'create', 'Informe um nome para o Processo');
        
        $validator->notEmpty('participante_id', 'Informe o Exercício');
        $validator->notEmpty('nome',            'Informe um nome para o Processo');
        
        return $validator;
    }
    
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        Sanitize::trimFields($data, [
            'nome',
            'observacoes',
        ]);
    }
    
    public function listar (Uex $uex = null, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs.Ufs',
                'Participantes.Exercicios',
                'ProcessoModalidades.Modalidades',
                'Cardapios.CardapioTipos',
                'Cardapios.Atendimentos',
            ],
            'order' => [
                'Processos.created DESC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        if ($uex !== null) {
            $options['conditions'][] = [
                'Participantes.uex_id' => $uex->id,
            ];
        }
        return $this->find('all', $options);
    }
    
    /**
     * Retorna as informações do Processo especificado
     * 
     * @param int $processoId
     * @param array $options
     * 
     * @return \Enutri\Model\Entity\Processo;
     */
    public function localizar ($processoId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Participantes.Uexs.Ufs',
                'Participantes.Exercicios',
                'ProcessoModalidades.Modalidades',
                'Cardapios.CardapioTipos',
                'Cardapios.Atendimentos',
                'Cardapios.Ingredientes.Alimentos.ConsumoMedida',
                'Cardapios.Ingredientes.Alimentos.CompraMedida',
                'AprovadorUsuario',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($processoId, $options);
    }
    
    /**
     * Aprova um Processo
     * 
     * @param Processo $processo Processo a ser aprovado
     * @param Usuario $usuario Usuário responsável por "assinar" o Processo
     * @return \Enutri\Model\Entity\Processo
     */
    public function aprovar (Processo $processo, Usuario $usuario)
    {
        $processo->aprovado = true;
        $processo->aprovador_usuario_id = $usuario->id;
        $processo->aprovacao_data = \Cake\I18n\Time::now();
        return $this->save($processo);
    }
    
    /**
     * Reprova um processo (define-o como "aguardando avaliação")
     * 
     * @param Processo $processo
     * @return \Cake\Datasource\EntityInterface
     */
    public function reprovar (Processo $processo)
    {
        $processo->aprovado = false;
        $processo->aprovador_id = null;
        $processo->aprovacao_data = null;
        return $this->save($processo);
    }
    
    /**
     * Obtém a relação de Processos referentes ao Exercício especificado
     * 
     * @param Exercicio $exercicio
     * @return \Cake\ORM\Query
     */
    public function listarPorExercicio (Exercicio $exercicio)
    {
        return $this->listar(null, [
            'conditions' => [
                'Participantes.exercicio_id' => $exercicio->id,
            ]
        ]);
    }
}
