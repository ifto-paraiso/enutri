<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

namespace Enutri\Controller;

use RuntimeException;

/**
 * Controller da gestão de alimentos
 * 
 */
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
        } catch (RuntimeException $e) {
            $this->Flash->error('Alimento não encontrado.');
            return $this->redirect(['action' => 'listar']);
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
    
    /**
     * Edição das informações de um Alimento
     * 
     * @param int $alimentoId
     * @return void
     */
    public function editar($alimentoId = null)
    {
        try {
            $alimento = $this->Alimentos->localizar($alimentoId);
            if ($this->request->is(['post', 'put'])) {
                $this->Alimentos->patchEntity($alimento, $this->request->data);
                if ($this->Alimentos->save($alimento)) {
                    $this->Flash->success('As informações do alimento foram atualizadas.');
                    return $this->redirect(['action' => 'visualizar', h($alimento->id)]);
                }
                $this->Flash->error('Não foi possível salvar as alterações.');
            }
            $this->loadModel('Medidas');
            $this->set('medidas', $this->Medidas->getList());
            $this->set(compact('alimento'));
        } catch (RuntimeException $e) {
            $this->Flash->error('Alimento não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Exclusão do alimento especificado
     * 
     * @param int $alimentoId
     * @return void
     */
    public function excluir($alimentoId = null)
    {
        try {
            $alimento = $this->Alimentos->localizar($alimentoId);
            if ($this->request->is(['post', 'put'])) {
                if ($this->Alimentos->excluir($alimento)) {
                    $this->Flash->success('O alimento foi excluído com sucesso.');
                    return $this->redirect(['action' => 'listar']);
                }
                $this->Flash->error('Ocorreu um erro ao excluir o alimento.');
            }
            $this->set(compact('alimento'));
        } catch (RuntimeException $e) {
            $this->Flash->error('Alimento não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}
