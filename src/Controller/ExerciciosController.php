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
    
    /**
     * Exclusão de Exercício
     * 
     * @param int $exercicioId
     * 
     * @return void
     */
    public function excluir ($exercicioId = null)
    {
        try {
            $exercicio = $this->Exercicios->localizar($exercicioId);
            if ($this->request->is(['post', 'put'])) {
                if ($this->Exercicios->delete($exercicio)) {
                    $this->Flash->success('O Exercício foi excluído do sistema.');
                    return $this->redirect(['action' => 'listar']);
                }
                $this->Flash->error('Não foi possível excluir o Exercício.');
            }
            $this->set(compact('exercicio'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Exercício não localizado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Inclusão de UEx participante de um Exercício
     * 
     * @param int $exercicioId
     * 
     * @return void
     */
    public function participanteInserir ($exercicioId = null)
    {
        try {
            
            $exercicio = $this->Exercicios->localizar($exercicioId);
            
            $this->loadModel('Uexs');
            $uexs = $this->Uexs->getList();
            
            // Remove da lista as UEx que já estão participando do Exercício
            foreach ($exercicio->participantes as $participante) {
                if (isset($uexs[$participante->uex_id])) {
                    unset($uexs[$participante->uex_id]);
                }
            }
            
            // Verifica se sobrou alguma UEx para ser incluída no Exercício
            if (count($uexs) < 1) {
                $this->Flash->warning('Todas as UExs já estão participando do Exercício.');
                return $this->redirect(['action' => 'visualizar', h($exercicio->id)]);
            }
            
            $this->loadModel('Participantes');
            $participante = $this->Participantes->newEntity();            

            if ($this->request->is(['post', 'put'])) {
                
                $this->Participantes->patchEntity($participante, $this->request->data);
                $participante->exercicio_id = $exercicio->id;
                
                if ($this->Participantes->save($participante)) {
                    $this->Flash->success('A UEx foi inserida no Exercício.');
                    return $this->redirect(['action' => 'visualizar', h($exercicio->id)]);
                }
                
                $this->Flash->error('Não foi possível salvar as alterações.');
            }
            
            $this->set(compact('exercicio'));
            $this->set(compact('uexs'));
            $this->set(compact('participante'));
            
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Exercício não localizado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}