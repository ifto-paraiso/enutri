<?php

namespace Enutri\Model\Table;

class IngredientesTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Alimentos');
    }
}