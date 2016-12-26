<?php

namespace Enutri\Controller;

class AlimentosController extends AppController
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
     * Listagem dos alimentos cadastrados
     * 
     * @return void
     */
    public function listar()
    {
        $alimentos = $this->Alimentos->listar();
        $this->set(compact('alimentos'));
    }
}
