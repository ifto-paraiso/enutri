<?php

namespace Enutri\Model\Table;

use Cake\Validation\Validator;
use Cake\Event\Event;
use Enutri\Model\Util\Sanitize;
use ArrayObject;

class UexsTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->displayField('nome_reduzido');
        $this->belongsTo('Ufs');
    }
    
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        // Informações obrigatórias no cadastro
        $validator->requirePresence('nome',          'create', 'Informe o nome')
                  ->requirePresence('nome_reduzido', 'create', 'Informe o nome reduzido')
                  ->requirePresence('email',         'create', 'Informe o email')
                  ->requirePresence('telefone1',     'create', 'Informe o telefone')
                  ->requirePresence('endereco',      'create', 'Informe o endereço')
                  ->requirePresence('bairro',        'create', 'Informe o bairro')
                  ->requirePresence('municipio',     'create', 'Informe o município')
                  ->requirePresence('uf_id',         'create', 'Informe o Estado');
        
        // Dados que não podem ser deixados em branco
        $validator->notEmpty('nome',          'Informe o nome')
                  ->notEmpty('nome_reduzido', 'Informe o nome reduzido')
                  ->notEmpty('email',         'Informe o email')
                  ->notEmpty('telefone1',     'Informe o telefone')
                  ->notEmpty('endereco',      'Informe o endereço')
                  ->notEmpty('bairro',        'Informe o bairro')
                  ->notEmpty('municipio',     'Informe o município')
                  ->notEmpty('uf_id',         'Informe o Estado');

        // Regras específicas
        $validator->email('email', false, 'Informe um email válido');
        
        return $validator;
    }
    
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        Sanitize::trimFields($data, [
            'nome',
            'nome_reduzido',
            'email',
            'telefone1',
            'telefone2',
            'endereco',
            'bairro',
            'municipio',
        ]);
    }

    public function listar()
    {
        return $this->find('all', [
            'contain' => [
                'Ufs',
            ],
            'order' => [
                'Ufs.nome',
            ]
        ]);
    }
    
    public function localizar($uexId)
    {
        return $this->get($uexId, [
            'contain' => [
                'Ufs',
            ],
        ]);
    }
    
    public function getList()
    {
        return $this->find('list', ['order' => 'nome'])->toArray();
    }
}