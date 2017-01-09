<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\Exception\InvalidPrimaryKeyException;

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
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        } catch (InvalidPrimaryKeyException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}
