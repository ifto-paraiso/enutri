<?php

namespace Enutri\Model\Table;

class UsuariosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Grupos');
        $this->belongsTo('Ufs');
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
            ],
        ]);
    }
}