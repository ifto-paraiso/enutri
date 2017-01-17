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
use Cake\Event\Event;
use Cake\ORM\Query;
use Enutri\Model\Util\Sanitize;
use Enutri\Model\Entity\Usuario;
use ArrayObject;

/**
 * Repositório para manipulação de usuários
 * 
 */
class UsuariosTable extends EnutriTable
{
    /**
     * Inicialização da instância da classe
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Grupos');
        $this->belongsTo('Ufs');
        $this->hasMany('Lotacoes');
    }
    
    /**
     * Regras de validação default
     * 
     * @param Validator $validator
     * @return Validator
     */
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
        $validator->notEmpty('grupo_id',   'Informe o Grupo');
        $validator->notEmpty('nome',       'Informe o nome');
        $validator->notEmpty('email',      'Informe o email');
        $validator->notEmpty('endereco',   'Informe o endereço');
        $validator->notEmpty('municipio',  'Informe o município');
        $validator->notEmpty('uf_id',      'Informe o estado');
        $validator->notEmpty('senhaAtual', 'Informe a senha atual');
        $validator->notEmpty('senha',      'Informe a senha');
        $validator->notEmpty('senha2',     'Repita a senha');
        
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
    
    /**
     * Ações a serem realizadas antes da validação dos dados
     * 
     * @param Event $event
     * @param ArrayObject $data
     * @param ArrayObject $options
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        Sanitize::trimFields($data, [
            'nome', 'email', 'endereco', 'municipio', 'telefone', 'telefone2',
        ]);
    }

    /**
     * Obtém a lista de usuários cadastrados
     * 
     * @return Query
     */
    public function listar()
    {
        return $this->find('all', [
            'contain' => [
                'Grupos',
            ]
        ]);
    }
    
    /**
     * Retorna as informaçoes do usuário especificado
     * 
     * @param int $usuarioId
     * @param array $options
     * 
     * @return 
     */
    public function localizar($usuarioId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Grupos',
                'Ufs',
                'Lotacoes.Uexs'
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        
        return $this->get($usuarioId, $options);
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
    
    /**
     * Acrescenta informações para a busca do componente Auth
     * 
     * @param Query $query
     * @param array $options
     * @return Query
     */
    public function findAuth(Query $query, array $options)
    {
        $query->contain(['Grupos']);
        return $query;
    }
    
    /**
     * Altera a senha de um usuário
     * 
     * @param Usuario $usuario
     * @return \Cake\ORM\Entity
     */
    public function alterarSenha(Usuario $usuario)
    {
        return $this->save($usuario);
    }
}
