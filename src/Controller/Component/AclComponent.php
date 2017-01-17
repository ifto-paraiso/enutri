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

namespace Enutri\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

/**
 * Componente de controle de acesso
 * 
 */
class AclComponent extends Component
{
    /**
     * Conjunto de permissões
     * 
     * @var array
     */
    protected $permissions;
    
    /**
     * Inicialização do componente
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->permissions = Configure::read('Permissions');
    }
    
    /**
     * Verifica se um determinado grupo de usuários tem acesso à URL, de acordo
     * com os parâmetros recebidos
     * 
     * @param array $params  Parâmetros da URL
     * @param string $grupo  Alias do grupo
     * @return boolean
     */
    public function check($params, $grupo = 'public')
    {
        $controller = $params['controller'];
        $action     = $params['action'];
        if (!isset($this->permissions[$grupo])) {
            $grupo = 'public';
        }
        if (!isset($this->permissions[$grupo][$controller])) {
            return false;
        }
        $actions = $this->permissions[$grupo][$controller];
        if (!isset($actions[$action]) || $actions[$action] !== 'allow') {
            return false;
        }
        return true;
    }
}
