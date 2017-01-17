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
use Cake\Auth\DefaultPasswordHasher;
use Enutri\Model\Entity\Uex;

/**
 * Entidade "Usuário"
 * 
 */
class Usuario extends Entity
{
    protected $hasher;
    
    public function __construct(array $properties = array(), array $options = array())
    {
        parent::__construct($properties, $options);
        $this->hasher = new DefaultPasswordHasher();
    }

    protected function _setSenha($senha)
    {
        if (strlen($senha) > 0) {
            return $this->hasher->hash($senha);
        }
    }
    
    public function check($senha)
    {
        return $this->hasher->check($senha, $this->senha);
    }
    
    /**
     * Verifica se o usuário está lotado na UEx especificada
     * 
     * @param Uex $uex
     * 
     * @return boolean True, se o usuário estiver lotado na UEx, ou se ele
     *                 não tiver nenhuma lotação (acesso geral).
     */
    public function lotado (Uex $uex)
    {
        if (count($this->lotacoes) == 0) {
            return true;
        }
        foreach ($this->lotacoes as $lotacao) {
            if ($lotacao->uex_id == $uex->id) {
                return true;
            }
        }
        return false;
    }
}
