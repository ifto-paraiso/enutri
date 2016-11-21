<?php

namespace Enutri\Model\Table;

use Cake\Validation\Validator;
use Enutri\Model\Entity\Usuario;

class UexsTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Ufs');
    }
    
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        return $validator;
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
    
    public function localizar($usuarioId)
    {
        return $this->get($usuarioId, [
            'contain' => [
                'Grupos',
                'Ufs',
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