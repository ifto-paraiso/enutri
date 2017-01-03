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
}