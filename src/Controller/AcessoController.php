<?php

namespace Enutri\Controller;

/**
 * Realiza o controle de autenticação no sistema
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class AcessoController extends AppController
{
    /**
     * Action default
     * 
     * @return void
     */
    public function index()
    {
        return $this->redirect(['action' => 'login']);
    }
    
    /**
     * Autenticação do usuário
     * 
     * @return void
     */
    public function login()
    {
        $this->viewBuilder()->layout('login');
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'painel']);
        }
        if ($this->request->is(['post', 'put'])) {
            if ($usuario = $this->Auth->identify()) {
                $this->Auth->setUser($usuario);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Usuário ou senha incorretos!');
            }
        }
    }
}