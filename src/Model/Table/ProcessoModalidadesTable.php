<?php

namespace Enutri\Model\Table;

use Cake\Validation\Validator;

class ProcessoModalidadesTable extends EnutriTable
{
    /**
     * Inicialização da instância da classe
     * 
     * @param void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Modalidades');
        $this->belongsTo('Processos');
    }
    
    /**
     * Regras de validação da entidade
     * 
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('processo_id',   'create', 'Informe o processo');
        $validator->requirePresence('modalidade_id', 'create', 'Informe a modalidade de ensino');
        $validator->requirePresence('publico',       'create', 'Informe o público');
        
        $validator->notEmpty('processo_id',   'Informe o processo');
        $validator->notEmpty('modalidade_id', 'Informe a modalidade de ensino');
        $validator->notEmpty('publico',       'Informe o público');
        
        $validator->numeric('publico', 'Valor inválido');
        $validator->range('publico', [1, 100000], 'Valor inválido');
        
        return $validator;
    }
    
    public function localizar($processoModalidadeId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Processos.Participantes.Uexs',
                'Processos.Participantes.Exercicios',
                'Processos.ProcessoModalidades.Modalidades',
                'Processos.Cardapios.Atendimentos',
                'Modalidades',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($processoModalidadeId, $options);
    }
}
