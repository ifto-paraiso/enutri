<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class UexsController extends AppController
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
        $uexs = $this->Uexs->listar();
        $this->set(compact('uexs'));
    }
    
    public function visualizar($uexId = null)
    {
        try {
            $uex = $this->Uexs->localizar($uexId);
            $this->set(compact('uex'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Unidade Executora não encontrada.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    public function cadastrar()
    {
        $uex = $this->Uexs->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Uexs->patchEntity($uex, $this->request->data);
            if ($this->Uexs->save($uex)) {
                $this->Flash->success('Unidade Executora cadastrada!');
                return $this->redirect(['action' => 'visualizar', $uex->id]);
            }
            $this->Flash->error('Não foi possível salvar a Unidade Executora.');
        }
        $this->loadModel('Ufs');
        $ufs = $this->Ufs->getList();
        $this->set(compact('ufs'));
        $this->set(compact('uex'));
    }
    
    
    public function editar($uexId = null)
    {
        try {
            $uex = $this->Uexs->localizar($uexId);
            if ($this->request->is(['post', 'put'])) {
                $this->Uexs->patchEntity($uex, $this->request->data);
                if ($this->Uexs->save($uex)) {
                    $this->Flash->success('Os dados da UEx foram atualizados.');
                    return $this->redirect(['action' => 'visualizar', $uexId]);
                }
                $this->Flash->error('Não foi possível salvar os dados da UEx.');
            }
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('UEx não encontrada.');
            return $this->redirect(['action' => 'listar']);
        }
        $this->loadModel('Ufs');
        $ufs    = $this->Ufs->getList();
        $this->set(compact('ufs'));
        $this->set(compact('uex'));
    }
    
    /*
     * TODO: Descomentar e alterar o restante do código nos próximos incrementos
     * 
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
     * 
     */
}