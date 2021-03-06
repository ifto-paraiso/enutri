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

use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Controller da gestão de usuários
 * 
 */
class UsuariosController extends AppController
{
    /**
     * Action default do controller
     *
     * @return void
     */
    public function index()
    {
        $this->redirect(['action' => 'listar']);
    }

    /**
     * Listagem de usuários cadastrados
     *
     * @return void
     */
    public function listar()
    {
        $usuarios = $this->Usuarios->listar();
        $this->set(compact('usuarios'));
    }
    
    
    public function visualizar($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            $this->set(compact('usuario'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    public function cadastrar()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Usuário cadastrado!');
                return $this->redirect(['action' => 'visualizar', $usuario->id]);
            }
            $this->Flash->error('Não foi possível salvar o usuário.');
        }
        $this->loadModel('Ufs');
        $this->loadModel('Grupos');
        $ufs    = $this->Ufs->getList();
        $grupos = $this->Grupos->getList();
        $this->set(compact('ufs'));
        $this->set(compact('grupos'));
        $this->set(compact('usuario'));
    }
    
    public function editar($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            if ($this->request->is(['post', 'put'])) {
                $this->Usuarios->patchEntity($usuario, $this->request->data);
                if ($this->Usuarios->atualizar($usuario)) {
                    $this->Flash->success('Os dados do usuário foram atualizados.');
                    return $this->redirect(['action' => 'visualizar', $usuarioId]);
                }
                $this->Flash->error('Não foi possível salvar os dados do usuário.');
            }
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
        $this->loadModel('Ufs');
        $this->loadModel('Grupos');
        $ufs    = $this->Ufs->getList();
        $grupos = $this->Grupos->getList();
        $this->set(compact('ufs'));
        $this->set(compact('grupos'));
        $this->set(compact('usuario'));
    }
    
    public function excluir($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            if ($this->request->is(['post', 'put'])) {
                if ($this->Usuarios->delete($usuario)) {
                    $this->Flash->success('O usuário foi excluído do sistema.');
                    return $this->redirect(['action' => 'listar']);
                }
                $this->Flash->error('Ocorreu um erro ao excluir o usuário.');
            }
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
        $this->set(compact('usuario'));
    }
    
    /**
     * Realiza a Lotação de um Usuário em uma UEx
     * 
     * @param int $usuarioId
     * @return void
     */
    public function lotacaoCadastrar($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            $this->loadModel('Lotacoes');
            $this->loadModel('Uexs');
            $uexs = $this->Uexs->getList();
            foreach ($usuario->lotacoes as $lotacao) {
                if (array_key_exists($lotacao->uex_id, $uexs)) {
                    unset($uexs[$lotacao->uex_id]);
                }
            }
            if (count($uexs) < 1) {
                $this->Flash->warning('O usuário já está lotado em todas as UExs.');
                return $this->redirect(['action' => 'visualizar', $usuarioId]);
            }
            $lotacao = $this->Lotacoes->newEntity();
            if ($this->request->is(['post', 'put'])) {
                $uex = $this->Uexs->localizar($this->request->data['uex_id']);
                $lotacao->usuario_id = $usuarioId;
                $lotacao->uex_id     = $uex->id;
                if ($this->Lotacoes->save($lotacao)) {
                    $this->Flash->success("O usuário foi lotado na UEx {$uex->nome_reduzido}");
                    return $this->redirect(['action' => 'visualizar', $usuarioId]);
                }
            }
            $this->set(compact('usuario'));
            $this->set(compact('lotacao'));
            $this->set(compact('uexs'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Remoção da Lotação de um Usuário
     * 
     * @param int $lotacaoId
     * @return void
     */
    public function lotacaoExcluir($lotacaoId = null)
    {
        try {
            $this->loadModel('Lotacoes');
            $lotacao = $this->Lotacoes->localizar($lotacaoId);
            if ($this->request->is(['put', 'post'])) {
                if ($this->Lotacoes->delete($lotacao)) {
                    $usuarioId = $lotacao->usuario->id;
                    $this->Flash->success('A lotação foi removida com sucesso!');
                    return $this->redirect(['action' => 'visualizar', $usuarioId]);
                }
                $this->flash->error('Ocorreu um erro ao remover a lotação.');
            }
            $this->set(compact('lotacao'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Lotação inválida.');
            return $this->redirect(['action' => 'listar']);
        }
    }
    
    /**
     * Alteração da senha do usuário logado
     * 
     * @return void
     */
    public function alterarSenha()
    {
        try {
            $usuario = $this->Usuarios->localizar($this->Auth->user()['id']);
            if ($this->request->is(['put', 'post'])) {
                if (!$usuario->check($this->request->data['senhaAtual'])) {
                    $this->Flash->error('Senha atual incorreta');
                } else {
                    $this->Usuarios->patchEntity($usuario, $this->request->data);
                    if ($this->Usuarios->alterarSenha($usuario)) {
                        $this->Flash->success('Senha alterada com sucesso!');
                    } else {
                        $this->Flash->error('Ocorreu um erro ao alterar a senha!');
                    }
                }
            }
            $this->set(compact('usuario'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Ocorreu um erro ao localizar o usuário.');
            return $this->redirect(['controller' => 'Painel']);
        }
    }
    
    /**
     * Redefinição da senha de um usuário
     * 
     * @param int $usuarioId
     * @return void
     */
    public function redefinirSenha($usuarioId = null)
    {
        try {
            $usuario = $this->Usuarios->localizar($usuarioId);
            if ($this->request->is(['put', 'post'])) {
                $this->Usuarios->patchEntity($usuario, $this->request->data);
                if ($this->Usuarios->alterarSenha($usuario)) {
                    $this->Flash->success('Senha redefinida com sucesso!');
                    return $this->redirect(['action' => 'visualizar', h($usuarioId)]);
                }
                $this->Flash->error('Ocorreu um erro ao redefinir a senha.');
            }
            $this->set(compact('usuario'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'listar']);
        }
    }
}
