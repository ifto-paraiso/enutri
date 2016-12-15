<?php

namespace Enutri\Model\Table;

class GruposTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->displayField('nome');
    }
    
    public function getList()
    {
        return $this->find('list', ['order' => 'nome'])
                    ->toArray();
    }
}