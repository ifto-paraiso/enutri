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
}