<?php

namespace Enutri\Model\Table;

use Cake\Validation\Validator;

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
