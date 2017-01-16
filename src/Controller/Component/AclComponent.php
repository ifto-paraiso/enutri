<?php

namespace Enutri\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

/**
 * Componente de controle de acesso
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
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