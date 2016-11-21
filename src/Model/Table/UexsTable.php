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
    
    public function localizar($uexId)
    {
        return $this->get($uexId, [
            'contain' => [
                'Ufs',
            ],
        ]);
    }
}