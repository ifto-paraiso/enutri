<?php

namespace Enutri\Controller;

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
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    public function visualizar ($cardapioId = null)
    {
        try {
            $cardapio = $this->Cardapios->localizar($cardapioId);
            $this->set(compact('cardapio'));
        } catch (Exception $ex) {

        }
    }
}