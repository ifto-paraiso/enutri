<?php

namespace Enutri\Controller;

use RuntimeException;

class CentralizacoesController extends AppController
{
    /**
     * Action default do controller
     * 
     * @return void
     */
    public function index()
    {
        return $this->redirect(['action' => 'listar']);
    }
    
    /**
     * Listagem das centralizações cadastradas
     * 
     * @return void
     */
    public function listar()
    {
        $centralizacoes = $this->Centralizacoes->listar();
        $this->set(compact('centralizacoes'));
    }
    
    /**
     * Visualização das informações da centralização especificada
     * 
     * @param int $processoId
     * @return void
     */
    public function visualizar($centralizacaoId = null)
    {
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            $this->set(compact('centralizacao'));
        } catch (RuntimeException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Exclusão da centralização especificada
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function excluir ($centralizacaoId = null)
    {
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            if ($this->request->is(['post', 'put'])) {
                if ($this->Centralizacoes->delete($centralizacao)) {
                    $this->Flash->success('Centralização excluída com sucesso.');
                    return $this->redirect(['action' => 'listar']);
                }
                $this->Flash->error('Não foi possível excluir a centralização.');
            }
            $this->set(compact('centralizacao'));
        } catch (RuntimeException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}
 