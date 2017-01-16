<?php

namespace Enutri\Model\Table;

class MedidasTable extends EnutriTable
{
    /**
     * Configurações de inicialização da classe
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->displayField('sigla');
    }
    
    /**
     * Retorna a lista de unidades de medida para serem usadas em selects
     * pelo FormHelper
     * 
     * @return array
     */
    public function getList()
    {
        return $this->find('list')->toArray();
    }
}
