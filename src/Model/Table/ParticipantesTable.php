<?php

namespace Enutri\Model\Table;

use ArrayObject;
use Cake\Validation\Validator;
use Cake\Event\Event;

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
}
