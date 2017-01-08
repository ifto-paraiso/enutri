<?php

namespace Enutri\Controller;

class CentralizacoesController extends AppController
{
    /**
     * Action default do controller
     * 
     */
    public function index()
    {
        return $this->redirect(['action' => 'listar']);
    }
    
    /**
     * Listagem das centralizações cadastradas
     * 
     */
    public function listar()
    {
        $centralizacoes = $this->Centralizacoes->listar();
        $this->set(compact('centralizacoes'));
    }
}
