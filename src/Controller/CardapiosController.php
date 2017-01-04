<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Enutri\Model\Entity\Uex;

class CardapiosController extends AppController
{
    /**
     * Verifica se o usuário logado possui permissão para acessar recursos da
     * UEx especificada
     * 
     * @param Uex $uex
     * 
     * @return void
     */
    protected function verificarPermissao(Uex $uex)
    {
        if (!$this->usuarioLogado->lotado($uex)) {
            $this->Flash->error('Selecione uma UEx válida.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
    
    /**
     * Visualização das informações do cardápio especificado
     * 
     * @param type $cardapioId
     * 
     * @return void
     */
    public function visualizar ($cardapioId = null)
    {
        try {
            $cardapio = $this->Cardapios->localizar($cardapioId);
            $this->verificarPermissao($cardapio->processo->participante->uex);
            $this->set(compact('cardapio'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Cardápio inválido.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
    
    /**
     * Cadastro de novo cardápio
     * 
     * @param int $processoId
     * 
     * @return void
     */
    public function cadastrar ($processoId = null)
    {
        try {
            $this->loadModel('Processos');
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            $cardapio = $this->Cardapios->newEntity();
            if ($this->request->is(['post', 'put'])) {
                $this->Cardapios->patchEntity($cardapio, $this->request->data);
                $cardapio->processo_id = $processo->id;
                if ($this->Cardapios->save($cardapio)) {
                    $this->Flash->success('Cardápio cadastrado com sucesso.');
                    return $this->redirect(['action' => 'visualizar', $cardapio->id]);
                }
                $this->Flash->error('Não foi possivel salvar o cardápio.');
            }
            $this->loadModel('CardapioTipos');
            $this->set('cardapioTipos', $this->CardapioTipos->getList());
            $this->set(compact('cardapio'));
            $this->set(compact('processo'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
    
    /**
     * Edição das informações do cardápio especificado
     * 
     * @param int $cardapioId
     */
    public function editar ($cardapioId = null)
    {
        try {
            $cardapio = $this->Cardapios->localizar($cardapioId);
            $this->verificarPermissao($cardapio->processo->participante->uex);
            if ($this->request->is(['post', 'put'])) {
                $this->Cardapios->patchEntity($cardapio, $this->request->data);
                if ($this->Cardapios->save($cardapio)) {
                    $this->Flash->success('As informações do cardápio foram atualizadas.');
                    return $this->redirect(['action' => 'visualizar', $cardapio->id]);
                }
                $this->Flash->error('Não foi possível salvar as alterações.');
            }
            $this->loadModel('CardapioTipos');
            $this->set('cardapioTipos', $this->CardapioTipos->getList());
            $this->set(compact('cardapio'));
        } catch (RecordNotFoundException $ex) {
            $this->Flash->error('Cardápio inválido.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
    
    /**
     * Exclusão do cardápio especificado
     * 
     * @param int $cardapioId
     */
    public function excluir ($cardapioId = null) 
    {
        try {
            $cardapio = $this->Cardapios->localizar($cardapioId);
            $this->verificarPermissao($cardapio->processo->participante->uex);
            $processoId = $cardapio->processo->id;
            if ($this->Cardapios->delete($cardapio)) {
                $this->Flash->success('As informações do cardápio foram atualizadas.');
                return $this->redirect([
                    'controller' => 'Processos',
                    'action' => 'visualizar',
                    $processoId,
                ]);
            } else {
                $this->Flash->error('Não foi possível excluir este cardápio.');
                return $this->redirect(['action' => 'visualizar', $cardapio->id]);
            }
        } catch (RecordNotFoundException $ex) {
            $this->Flash->error('Cardápio inválido.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
    
    /**
     * Remoção do ingrediente especificado
     * Obs: Remoção sem solicitação de confirmação
     * 
     * @param int $ingredienteId
     */
    public function ingredienteRemover ($ingredienteId = null)
    {
        try {
            $this->loadModel('Ingredientes');
            $ingrediente = $this->Ingredientes->localizar($ingredienteId);
            $this->verificarPermissao($ingrediente->cardapio->processo->participante->uex);
            $cardapioId = $ingrediente->cardapio->id;
            if ($this->Ingredientes->delete($ingrediente)) {
                $this->Flash->success('O ingrediente foi removido do cardápio.');
                return $this->redirect([
                    'action' => 'visualizar',
                    $cardapioId,
                ]);
            } else {
                $this->Flash->error('Não foi possível excluir o ingrediente.');
                return $this->redirect(['action' => 'visualizar', $ingrediente->cardapio->id]);
            }
        } catch (RecordNotFoundException $ex) {
            $this->Flash->error('Cardápio inválido.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
    
    /**
     * Remoção do atendimento especificado
     * Obs: Remoção sem solicitação de confirmação
     * 
     * @param int $atendimentoId
     */
    public function atendimentoRemover ($atendimentoId = null)
    {
        try {
            $this->loadModel('Atendimentos');
            $atendimento = $this->Atendimentos->localizar($atendimentoId);
            $this->verificarPermissao($atendimento->cardapio->processo->participante->uex);
            $cardapioId = $atendimento->cardapio->id;
            if ($this->Atendimentos->delete($atendimento)) {
                $this->Flash->success('A data de atendimento foi removida do cardápio.');
                return $this->redirect([
                    'action' => 'visualizar',
                    $cardapioId,
                ]);
            } else {
                $this->Flash->error('Não foi possível excluir a data de atendimento.');
                return $this->redirect(['action' => 'visualizar', $atendimento->cardapio->id]);
            }
        } catch (RecordNotFoundException $ex) {
            $this->Flash->error('Cardápio inválido.');
            return $this->redirect([
                'controller' => 'Processos',
                'action' => 'selecionarUex',
            ]);
        }
    }
}