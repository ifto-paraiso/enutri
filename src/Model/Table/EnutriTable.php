<?php

namespace Enutri\Model\Table;

use Cake\ORM\Table;

class EnutriTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }
}