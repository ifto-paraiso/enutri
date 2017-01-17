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

/**
 * Controller para o controle de autenticação no sistema
 * 
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
    
    /**
     * Desautenticação do usuário
     * 
     * @return void
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
