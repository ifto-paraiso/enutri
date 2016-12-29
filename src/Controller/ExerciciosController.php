<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class ExerciciosController extends AppController
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
     * Listagem dos Exercícios cadastrados
     * 
     * @return void
     */
    public function listar()
    {
        $exercicios = $this->Exercicios->listar();
        $this->set(compact('exercicios'));
    }
    
    /**
     * Visualização das informações de um Exercício
     * 
     * @param int $exercicioId
     * 
     * @return void
     */
    public function visualizar($exercicioId = null)
    {
        try {
            $exercicio = $this->Exercicios->localizar($exercicioId);
            $this->set(compact('exercicio'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Exercício não localizado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Cadastro de novo Exercício
     * 
     * @return void
     */
    public function cadastrar()
    {
        $exercicio = $this->Exercicios->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Exercicios->patchEntity($exercicio, $this->request->data);
            if ($this->Exercicios->save($exercicio)) {
                $this->Flash->success('Exercício cadastrado com sucesso!');
                return $this->redirect(['action' => 'visualizar', h($exercicio->id)]);
            }
            $this->Flash->error('Não foi possível cadastrar o Exercício.');
        }
        $this->set(compact('exercicio'));
    }
    
    /**
     * Edição das informações de um Exercício
     * 
     * @param int $exercicioId
     * 
     * @return void
     */
    public function editar ($exercicioId = null)
    {
        try {
            $exercicio = $this->Exercicios->localizar($exercicioId);
            if ($this->request->is(['post', 'put'])) {
                $this->Exercicios->patchEntity($exercicio, $this->request->data);
                if ($this->Exercicios->save($exercicio)) {
                    $this->Flash->success('As informações do Exercício foram atualizadas.');
                    return $this->redirect(['action' => 'visualizar', h($exercicio->id)]);
                }
                $this->Flash->error('Não foi possível salvar as alterações.');
            }
            $this->set(compact('exercicio'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Exercício não localizado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}