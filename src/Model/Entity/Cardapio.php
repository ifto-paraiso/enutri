<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entidade "Cardápio"
 * 
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