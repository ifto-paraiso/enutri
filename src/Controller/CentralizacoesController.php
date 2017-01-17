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
 * Controller da gestão de centralizações
 * 
 */
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
        } catch (RuntimeException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Cadastro de nova Centralização
     * 
     * @return void
     */
    public function cadastrar ()
    {
        $centralizacao = $this->Centralizacoes->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Centralizacoes->patchEntity($centralizacao, $this->request->data);
            if ($this->Centralizacoes->save($centralizacao)) {
                $this->Flash->success('Centralização cadastrada com sucesso.');
                return $this->redirect([
                    'action' => 'visualizar',
                    $centralizacao->id,
                ]);
            }
            $this->Flash->error('Não foi possível salvar a centralização.');
        }
        $this->loadModel('Exercicios');
        $this->set('exercicios', $this->Exercicios->getList());
        $this->set(compact('centralizacao'));
    }
    
    /**
     * Edição das informações da centralização especificada
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function editar ($centralizacaoId = null)
    {
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            if ($this->request->is(['post', 'put'])) {
                $this->Centralizacoes->patchEntity($centralizacao, $this->request->data);
                if ($this->Centralizacoes->save($centralizacao)) {
                    $this->Flash->success('As informações da centralização foram atualizadas.');
                    return $this->redirect([
                        'action' => 'visualizar',
                        $centralizacao->id,
                    ]);
                }
                $this->Flash->error('Não foi possível salvar a alterações.');
            }
            $this->set(compact('centralizacao'));
        } catch (Exception $ex) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Exclusão da centralização especificada
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function excluir ($centralizacaoId = null)
    {
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            if ($this->request->is(['post', 'put'])) {
                if ($this->Centralizacoes->delete($centralizacao)) {
                    $this->Flash->success('Centralização excluída com sucesso.');
                    return $this->redirect(['action' => 'listar']);
                }
                $this->Flash->error('Não foi possível excluir a centralização.');
            }
            $this->set(compact('centralizacao'));
        } catch (RuntimeException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Inclusão de processos na centralização especificada
     * 
     * @param  int $centralizacaoId
     * @return void
     */
    public function processoIncluir ($centralizacaoId = null) 
    {
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            if ($this->request->is(['post', 'put'])) {
                $processos = $this->request->data['processos'];
                if ($this->Centralizacoes->incluirProcessos($centralizacao, $processos) === 0) {
                    $this->Flash->success('Os processos foram incluídos com sucesso.');
                } else {
                    $this->Flash->warning('Ocorreu(ram) erro(s) durante a inclusão do(s) processo(s). Por favor, confira a relação de Processos.');
                }
                return $this->redirect(['action' => 'visualizar', $centralizacao->id]);
            }
            
            /*
             * Obtém a lista de todos os processos referentes ao exercício
             * da centralização especificada
             */
            $this->loadModel('Processos');
            $processos = $this->Processos->listarPorExercicio($centralizacao->exercicio);
            
            /*
             * Constroi a lista de processsos a serem incluídos, eliminando
             * os processos já inclusos na centralização
             */
            $processosList = [];
            foreach ($processos as $key => $processo) {
                $incluso = false;
                foreach ($centralizacao->centralizacao_processos as $cProcesso) {
                    if ($cProcesso->processo_id == $processo->id) {
                        $incluso = true;
                        break;
                    }
                }
                if (!$incluso) {
                    $processosList[] = $processo;
                }
            }
            
            /*
             * Verifica se sobrou algum processo a ser incluído na centralização
             */
            if (count($processosList) < 1) {
                $this->Flash->warning('Não há processos a serem incluídos nesta centralização.');
                return $this->redirect(['action' => 'visualizar', $centralizacao->id]);
            }
            
            /*
             * Envia para a view a lista de processos e as informações da centralização
             */
            $this->set('processos', $processosList);
            $this->set(compact('centralizacao'));
            
        } catch (RuntimeException $e) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Remoção do processo especificado da centralização da qual ele faz parte
     * 
     * @param  int $centralizacaoProcessoId
     * @return void
     */
    public function processoRemover ($centralizacaoProcessoId = null) 
    {
        try {
            $this->loadModel('CentralizacaoProcessos');
            $cp = $this->CentralizacaoProcessos->localizar($centralizacaoProcessoId);
            $centralizacaoId = $cp->centralizacao_id;
            if ($this->CentralizacaoProcessos->delete($cp)) {
                $this->Flash->success('O processo foi removido com sucesso.');
            } else {
                $this->Flash->error('Não foi possível remover o proocesso.');
            }
            return $this->redirect([
                'action' => 'visualizar',
                $centralizacaoId,
            ]);
        } catch (RuntimeException $ex) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Emissão do relatório "Resumo da Centralização"
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function relatorioResumo ($centralizacaoId = null)
    {
        $this->relatorio($centralizacaoId);
    }
    
    /**
     * Emissão do relatório "Mapa de Distribuição de Alimentos"
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function relatorioMapa ($centralizacaoId = null)
    {
        $this->relatorio($centralizacaoId);
    }
    
    /**
     * Emissão do relatório "Mapa de Distribuição de Alimentos"
     * 
     * @param int $centralizacaoId
     * @return void
     */
    public function relatorioPrevisao ($centralizacaoId = null)
    {
        $this->relatorio($centralizacaoId);
    }
    
    /**
     * Método auxiliar para buscar as informações da centralização
     * 
     * @param int $centralizacaoId
     * @return void
     */
    private function relatorio ($centralizacaoId)
    {
        $this->viewBuilder()->layout('relatorio');
        try {
            $centralizacao = $this->Centralizacoes->localizar($centralizacaoId);
            if (!$centralizacao->aprovada) {
                $this->Flash->error('A centralização possui processo(s) não aprovado(s).');
                return $this->redirect(['action' => 'visualizar', $centralizacao->id]);
            }
            $this->set(compact('centralizacao'));
        } catch (RuntimeException $ex) {
            $this->Flash->error('Centralização inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}
