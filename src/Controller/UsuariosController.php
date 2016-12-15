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
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    public function cadastrar()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Usuário cadastrado!');
                return $this->redirect(['action' => 'visualizar', $usuario->id]);
            }
            $this->Flash->error('Não foi possível salvar o usuário.');
        }
        $this->loadModel('Ufs');
        $this->loadModel('Grupos');
        $ufs    = $this->Ufs->getList();
        $grupos = $this->Grupos->getList();
        $this->set(compact('ufs'));
        $this->set(compact('grupos'));
        $this->set(compact('usuario'));
    }
    
    public function editar($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            if ($this->request->is(['post', 'put'])) {
                $this->Usuarios->patchEntity($usuario, $this->request->data);
                if ($this->Usuarios->atualizar($usuario)) {
                    $this->Flash->success('Os dados do usuário foram atualizados.');
                    return $this->redirect(['action' => 'visualizar', $usuarioId]);
                }
                $this->Flash->error('Não foi possível salvar os dados do usuário.');
            }
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
        $this->loadModel('Ufs');
        $this->loadModel('Grupos');
        $ufs    = $this->Ufs->getList();
        $grupos = $this->Grupos->getList();
        $this->set(compact('ufs'));
        $this->set(compact('grupos'));
        $this->set(compact('usuario'));
    }
    
    public function excluir($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            if ($this->request->is(['post', 'put'])) {
                if ($this->Usuarios->delete($usuario)) {
                    $this->Flash->success('O usuário foi excluído do sistema.');
                    return $this->redirect(['action' => 'listar']);
                }
                $this->Flash->error('Ocorreu um erro ao excluir o usuário.');
            }
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
        $this->set(compact('usuario'));
    }
    
    /**
     * Remoção da Lotação de um Usuário
     * 
     * @param int $lotacaoId
     * @return void
     */
    public function lotacaoExcluir($lotacaoId = null)
    {
        try {
            $this->loadModel('Lotacoes');
            $lotacao = $this->Lotacoes->localizar($lotacaoId);
            if ($this->request->is(['put', 'post'])) {
                if ($this->Lotacoes->delete($lotacao)) {
                    $usuarioId = $lotacao->usuario->id;
                    $this->Flash->success('A lotação foi removida com sucesso!');
                    return $this->redirect(['action' => 'visualizar', $usuarioId]);
                }
                $this->flash->error('Ocorreu um erro ao remover a lotação.');
            }
            $this->set(compact('lotacao'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Lotação inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}