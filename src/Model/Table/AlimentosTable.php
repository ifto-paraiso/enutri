<?php

namespace Enutri\Model\Table;

class AlimentosTable extends EnutriTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsTo('ConsumoMedida', [
            'foreignKey' => 'consumo_medida_id',
            'className'  => 'Medidas',
        ]);
        $this->belongsTo('CompraMedida', [
            'foreignKey' => 'compra_medida_id',
            'className'  => 'Medidas',
        ]);
    }
    
    /**
     * Retorna a listagem de alimentos cadastrados ordenados pelo nome
     * 
     * @return Cake\ORM\Query
     */
    public function listar()
    {
        return $this->find('all', [
            'order' => 'Alimentos.nome ASC',
        ]);
    }
    
    /**
     * Retorna o alimento com o id especificado
     * 
     * @param int $alimentoId
     * @return type
     */
    public function localizar($alimentoId)
    {
        return $this->get($alimentoId, [
            'contain' => [
                'ConsumoMedida',
                'CompraMedida',
            ]
        ]);
    }
}
