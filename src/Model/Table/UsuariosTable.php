<?php

namespace Enutri\Model\Table;

class UsuariosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('Grupos');
    }

    public function listar()
    {
        return $this->find('all', [
            'contain' => [
                'Grupos',
            ]
        ]);
    }
}