<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entidade "Cardápio"
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class Cardapio extends Entity
{
    /**
     * Siglas dos nutrientes
     * 
     * @var array
     */
    private $_nutrientes = [
        'kcal',
        'cho',
        'ptn',
        'lip',
        'ca',
        'fe',
        'mg',
        'zn',
        'vita',
        'vitc',
    ];
    
    /**
     * Obtém a frequência do cardápio
     * 
     * @return int
     */
    protected function _getFrequencia ()
    {
        return count($this->atendimentos);
    }
    
    /**
     * Obtém a frequência do cardápio em forma de texto
     * 
     * @return string
     */
    protected function _getFrequenciaFull ()
    {
        switch ($this->frequencia) {
            case 0:
                return 'Nunca';
            case 1:
                return '1 vez';
            default:
                return sprintf('%d vezes', $this->frequencia);
        }
    }
    
    /**
     * Obtém um array com a relação de nutrientes e suas respectivas quantidades
     * no cardápio
     * 
     * @return array
     */
    protected function _getNutrientes ()
    {
        $nutrientes = [];
        foreach ($this->_nutrientes as $nutrienteSigla) {
            $nutrientes[$nutrienteSigla] = $this->nutriente($nutrienteSigla);
        }
        return $nutrientes;
    }
    
    /**
     * Obtém a quantidade do nutriente especificado
     * 
     * @param string $nutriente Sigla do nutriente
     * 
     * @return float
     */
    public function nutriente ($nutriente)
    {
        $total = 0;
        foreach ($this->ingredientes as $ingrediente) {
            $total += $ingrediente->alimento->{$nutriente} / 100 * $ingrediente->quantidade;
        }
        return $total;
    }
    
    /**
     * Obtém o total do nutriente especificado
     * 
     * @param string $nutrienteAlias
     * @return int
     */
    public function getTotalNutriente($nutrienteAlias)
    {
        $kcal = 0;
        foreach ($this->ingredientes as $ingrediente) {
            $kcal += $ingrediente->getNutriente($nutrienteAlias);
        }
        return $kcal;
    }
}