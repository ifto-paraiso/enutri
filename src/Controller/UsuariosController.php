<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class UsuariosController extends AppController
{
    /**
     * Action default do controller
     *
     * @return void
     */
    public function index()
    {
        $this->redirect(['action' => 'listar']);
    }

    /**
     * Listagem de usuários cadastrados
     *
     * @return void
     */
    public function listar()
    {
        $usuarios = $this->Usuarios->listar();
        $this->set(compact('usuarios'));
    }
    
    
    public function visualizar($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            $this->set(compact('usuario'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->danger('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}