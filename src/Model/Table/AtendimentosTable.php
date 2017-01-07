<?php

namespace Enutri\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\Validation\Validator;
use Enutri\Model\Entity\Cardapio;

class AtendimentosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Cardapios');
    }
    
    public function localizar ($atendimentoId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Cardapios.Processos.Participantes.Uexs',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($atendimentoId, $options);
    }
    
    /**
     * Regras de validação defatul
     * 
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->date('data');
        
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
        $data['data'] = \Enutri\Utility\Formatting\Date::brToPhp($data['data']);
    }
    
    /**
     * Atualiza a relação de atendimentos do cardápio, criando, excluindo e 
     * alterando os atendimentos conforme a relação $atendimentos 
     * 
     * @param Cardapio $cardapio
     * @param array $atendimentos
     * @return int    
     */
    public function atualizar (Cardapio $cardapio, array $atendimentos = []) 
    {
        $errors = 0;
        
        // Remoção dos atendimentos que não constam na lista de atendimentos
        foreach ($cardapio->atendimentos as $atendimentoExistente) {
            $removido = true;
            foreach ($atendimentos as $atendimento) {
                if (isset($atendimento['id']) && $atendimento['id'] == $atendimentoExistente->id) {
                    $removido = false;
                    break;
                }
            }
            if ($removido) {
                if (!$this->delete($atendimentoExistente)) {
                    $errors++;
                }
            }
        }
        
        // Atualização e cadastro de novos ingredientes
        foreach ($atendimentos as $atendimento) {
            $atendimentoEditado = $this->newEntity();
            $atendimento['cardapio_id'] = $cardapio->id;
            $this->patchEntity($atendimentoEditado, $atendimento);
            if (!$this->save($atendimentoEditado)) {
                $errors++;
            }
        }
        
        return $errors;
    }
    
}