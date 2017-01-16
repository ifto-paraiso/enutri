<?php

namespace Enutri\Model\Table;

class UfsTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->displayField('sigla');
    }
    
    public function getList()
    {
        return $this->find('list', ['order' => 'sigla'])->toArray();
    }
}