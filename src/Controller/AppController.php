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

namespace Enutri\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Usuário atualmente logado no sistema
     * 
     * @var \Enutri\Model\Entity\Usuario;
     */
    protected $usuarioLogado;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        // Carregamento do componente de autenticação
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Acesso',
                'action'     => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'senha',
                    ],
                    'userModel' => 'Usuarios',
                    'finder'    => 'auth',
                ],
            ]
        ]);

        // Carregamento do componente de controle de acesso
        $this->loadComponent('Acl');
        
        /*
         * Carrega as informações do usuário que está atualmente logado no
         * sistema
         */
        $this->usuarioLogado = $this->usuarioLogado();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        $grupo = $user ? $user['grupo']['alias'] : null;
        if (!$this->Acl->check($this->request->params, $grupo)) {
            $this->Flash->error('Você não possui permissão para acessar o recurso solicitado.');
            return $this->redirect(['controller' => 'acesso', 'action' => 'login']);
        }
        $this->set(compact('user'));
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    /**
     * Obtém a entidade referente ao usuário logado
     * 
     * @return \Enutri\Model\Entity\Usuario
     */
    protected function usuarioLogado()
    {
        $usuario = $this->Auth->user();
        if ($usuario === null) {
            return null;
        }
        $this->loadModel('Usuarios');
        return $this->Usuarios->localizar($usuario['id']);
    }
}
