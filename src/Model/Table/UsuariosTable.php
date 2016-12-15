<?php

namespace Enutri\Model\Table;

use Cake\Validation\Validator;
use Cake\Event\Event;
use Enutri\Model\Util\Sanitize;
use Enutri\Model\Entity\Usuario;
use ArrayObject;

class UsuariosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Grupos');
        $this->belongsTo('Ufs');
        $this->hasMany('Lotacoes');
    }
    
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        // Dados que devem estar presentes no cadastro
        $validator->requirePresence('grupo_id',  'create', 'Informe o Grupo');
        $validator->requirePresence('nome',      'create', 'Informe o nome');
        $validator->requirePresence('email',     'create', 'Informe o email');
        $validator->requirePresence('endereco',  'create', 'Informe o endereço');
        $validator->requirePresence('municipio', 'create', 'Informe o município');
        $validator->requirePresence('uf_id',     'create', 'Informe o estado');
        $validator->requirePresence('senha',     'create', 'Informe a senha');
        $validator->requirePresence('senha2',    'create', 'Repita a senha');
        
        // Dados que não podem ser deixados em branco
        $validator->notEmpty('grupo_id',  'Informe o Grupo');
        $validator->notEmpty('nome',      'Informe o nome');
        $validator->notEmpty('email',     'Informe o email');
        $validator->notEmpty('endereco',  'Informe o endereço');
        $validator->notEmpty('municipio', 'Informe o município');
        $validator->notEmpty('uf_id',     'Informe o estado');
        $validator->notEmpty('senha',     'Informe a senha');
        $validator->notEmpty('senha2',    'Repita a senha');
        
        // Validações específicas
        $validator->email('email', false, 'Email inválido');
        $validator->add('email', 'uniqueEmail', [
            'rule' => 'validateUnique',
            'provider' => 'table',
            'message' => 'Já existe um usuário com este email'
        ]);
        $validator->add('senha', 'senhaLength', [
            'rule' => ['minLength', 6],
            'message' => 'Senha muito curta',
        ]);
        $validator->add('senha2', 'senhaCheck', [
            'rule' => ['compareWith', 'senha'],
            'message' => 'As senhas devem ser iguais',
        ]);
        
        return $validator;
    }
    
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        Sanitize::trimFields($data, [
            'nome', 'email', 'endereco', 'municipio', 'telefone', 'telefone2',
        ]);
    }

    public function listar()
    {
        return $this->find('all', [
            'contain' => [
                'Grupos',
            ]
        ]);
    }
    
    public function localizar($usuarioId)
    {
        return $this->get($usuarioId, [
            'contain' => [
                'Grupos',
                'Ufs',
                'Lotacoes.Uexs'
            ],
        ]);
    }
    
    /**
     * Atualiza os dados de um usuário
     * 
     * @param Usuario $usuario
     * @return @return \Cake\Datasource\EntityInterface|bool
     */
    public function atualizar(Usuario $usuario)
    {
        if (property_exists($usuario, 'senha')) {
            unset($usuario->senha);
        }
        return $this->save($usuario);
    }
}