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
     * Cadastro de nova Centralização
     * 
     * @return void
     */
    public function cadastrar ()
    {
        $centralizacao = $this->Centralizacoes->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Centralizacoes->patchEntity($centralizacao, $this->request->data);
            if ($this->Centralizacoes->save($centralizacao)) {
                $this->Flash->success('Centralização cadastrada com sucesso.');
                return $this->redirect([
                    'action' => 'visualizar',
                    $centralizacao->id,
                ]);
            }
            $this->Flash->error('Não foi possível salvar a centralização.');
        }
        $this->loadModel('Exercicios');
        $this->set('exercicios', $this->Exercicios->getList());
        $this->set(compact('centralizacao'));
    }
    
    /**
     * Edição das informações da centralização especificada
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function editar ($centralizacaoId = null)
    {
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            if ($this->request->is(['post', 'put'])) {
                $this->Centralizacoes->patchEntity($centralizacao, $this->request->data);
                if ($this->Centralizacoes->save($centralizacao)) {
                    $this->Flash->success('As informações da centralização foram atualizadas.');
                    return $this->redirect([
                        'action' => 'visualizar',
                        $centralizacao->id,
                    ]);
                }
                $this->Flash->error('Não foi possível salvar a alterações.');
            }
            $this->set(compact('centralizacao'));
        } catch (Exception $ex) {
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
    
    /**
     * Remoção do processo especificado da centralização da qual ele faz parte
     * 
     * @param  int $centralizacaoProcessoId
     * @return void
     */
    public function processoRemover ($centralizacaoProcessoId = null) 
    {
        try {
            $this->loadModel('CentralizacaoProcessos');
            $cp = $this->CentralizacaoProcessos->localizar($centralizacaoProcessoId);
            $centralizacaoId = $cp->centralizacao_id;
            if ($this->CentralizacaoProcessos->delete($cp)) {
                $this->Flash->success('O processo foi removido com sucesso.');
            } else {
                $this->Flash->error('Não foi possível remover o proocesso.');
            }
            return $this->redirect([
                'action' => 'visualizar',
                $centralizacaoId,
            ]);
        } catch (RuntimeException $ex) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}
 