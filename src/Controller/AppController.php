<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
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
