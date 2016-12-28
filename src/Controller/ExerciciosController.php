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
}