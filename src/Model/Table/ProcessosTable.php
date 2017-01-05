<?php

namespace Enutri\Model\Table;

use ArrayObject;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Enutri\Model\Entity\Uex;
use Enutri\Model\Entity\Usuario;
use Enutri\Model\Entity\Processo;
use Enutri\Model\Util\Sanitize;

class ProcessosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Participantes');
        $this->hasMany('ProcessoModalidades');
        $this->hasMany('Cardapios');
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
                'Participantes.Uexs',
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
                'Participantes.Uexs',
                'Participantes.Exercicios',
                'ProcessoModalidades.Modalidades',
                'Cardapios.CardapioTipos',
                'Cardapios.Atendimentos',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($processoId, $options);
    }
    
    public function aprovar (Processo $processo, Usuario $usuario)
    {
        $processo->aprovado = true;
        $processo->aprovador_usuario_id = $usuario->id;
        $processo->aprovacao_data = \Cake\I18n\Time::now();
        return $this->save($processo);
    }
    
    public function reprovar (Processo $processo)
    {
        $processo->aprovado = false;
        $processo->aprovador_id = null;
        $processo->aprovacao_data = null;
        return $this->save($processo);
    }
}
