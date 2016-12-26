<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

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
    
    public function visualizar($alimentoId = null)
    {
        try {
            $alimento = $this->Alimentos->localizar($alimentoId);
            $this->set(compact('alimento'));
        } catch (RecordNotFoundException $e) {
            
        }
    }
}
