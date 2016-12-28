<?php

namespace Enutri\Controller;

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
}