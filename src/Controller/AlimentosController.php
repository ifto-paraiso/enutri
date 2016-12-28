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
    
    /**
     * Visualização dos dados de um alimento
     * 
     * @param int $alimentoId
     */
    public function visualizar($alimentoId = null)
    {
        try {
            $alimento = $this->Alimentos->localizar($alimentoId);
            $this->set(compact('alimento'));
        } catch (RecordNotFoundException $e) {
            
        }
    }
    
    /**
     * Cadastro de um novo alimento
     * 
     * @return void
     */
    public function cadastrar()
    {
        $alimento = $this->Alimentos->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Alimentos->patchEntity($alimento, $this->request->data);
            if ($this->Alimentos->save($alimento)) {
                $this->Flash->success('Alimento cadastrado com sucesso!');
                return $this->redirect(['action' => 'visualizar', h($alimento->id)]);
            }
            $this->Flash->error('Não foi possível salvar o alimento.');
        }
        $this->loadModel('Medidas');
        $this->set('medidas', $this->Medidas->getList());
        $this->set(compact('alimento'));
    }
}
