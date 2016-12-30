<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class ProcessosController extends AppController
{
    /**
     * Action default do controller
     * 
     * @return void
     */
    public function index ()
    {
        return $this->redirect(['action' => 'selecionarUex']);
    }
    
    /**
     * Apresenta a relação de UExs para o usuário selecionar de qual UEX deseja
     * listar os processos. Se o usuário logado estiver lotado em alquma UEx, a
     * lista apresentará apenas as UExs nas quais ele estiver lotado.
     * 
     * @return void
     */
    public function selecionarUex ()
    {
        /*
         * Verifica se o usuário submeteu o formulário. Caso positivo, redireciona
         * para a listagem dos processos da UEx selecionada
         */
        if ($this->request->is(['post', 'put'])) {
            return $this->redirect([
                'action' => 'listar',
                $this->request->data['uex_id']
            ]);
        }
        
        /*
         * Construção da lista de Executoras a ser exibida...
         */
        $uexs = [];
        
        /*
         * Caso o usuário logado esteja lotado em apenas uma única UEx, ele é
         * redirecionado para a listagem dos processos, sem necessidade de 
         * apresentação da lista de seleção da UEx
         */
        if(count($this->usuarioLogado->lotacoes) == 1) {
            return $this->redirect([
                'action' => 'listar',
                $this->usuarioLogado->lotacoes[0]->uex_id,
            ]);
        }
        
        /*
         * Caso o usuário esteja lotado em mais de uma UEx, o sistema realiza
         * a construção da lista apenas com as UExs nas quais ele estiver lotado
         */
        if (count($this->usuarioLogado->lotacoes) > 0) {
            foreach ($this->usuarioLogado->lotacoes as $lotacao) {
                $uexs[$lotacao->uex_id] = $lotacao->uex->nome_reduzido;
            }
        }
        
        /*
         * Caso o usuário não possua nenhuma lotação, a lista apresentará todas
         * as UExs
         */
        else {
            $this->loadModel('Uexs');
            $uexs = $this->Uexs->getList();
        }
        
        // Envia a lista de UExs para a view
        $this->set(compact('uexs'));
    }
    
    /**
     * Listagem dos processos pertencentes à UEx especificada
     * 
     * @param int $uexId
     * 
     * @return void
     */
    public function listar($uexId = null)
    {
        /*
         * Carrega as informações da Unidade Executora da qual o sistema
         * listará os processos
         */
        try {
            $this->loadModel('Uexs');
            $uex = $this->Uexs->localizar($uexId);
            
            /*
             * Verifica se o usuário logado possui permissão para acessar a
             * listagem de processos da UEx especificada
             */
            if (!$this->usuarioLogado->lotado($uex)) {
                $this->Flash->error('Você não está lotado nesta UEx.');
                return $this->redirect(['action' => 'selecionarUex']);
            }
            
            /*
             * Obtém a lista de processos e envia os dados para a view
             */
            $processos = $this->Processos->listar($uex);
            $this->set(compact('processos'));
            $this->set(compact('uex'));
            
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Unidade Executora inválida.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Visualização das informações do processo especificado
     * 
     * @param int $processoId
     * 
     * @return void
     */
    public function visualizar ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            
            /*
             * Verifica se o usuário logado possui permissão para acessar a
             * listagem de processos da UEx especificada
             */
            if (!$this->usuarioLogado->lotado($processo->participante->uex)) {
                $this->Flash->error('Selecione uma Unidade Executora válida.');
                return $this->redirect(['action' => 'selecionarUex']);
            }
            
            $this->set(compact('processo'));
            
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Cadastro de um novo processo para a UEx especificada
     * 
     * @param int $uexId
     * 
     * @return void
     */
    public function cadastrar ($uexId = null)
    {
        try {
            $this->loadModel('Uexs');
            $uex = $this->Uexs->localizar($uexId);
            
            if (!$this->usuarioLogado->lotado($uex)) {
                $this->Flash->error('Selecione uma Unidade Executora válida.');
                return $this->redirect(['action' => 'selecionarUex']);
            }
            
            $processo = $this->Processos->newEntity();
            if ($this->request->is(['post', 'put'])) {
                $this->Processos->patchEntity($processo, $this->request->data);
                if ($this->Processos->save($processo)) {
                    $this->Flash->success('Processo cadastrado com sucesso.');
                    return $this->redirect(['action' => 'visualizar', h($processo->id)]);
                }
                $this->Flash->error('Não foi possível efetuar o cadastro do Processo.');
            }
            $this->loadModel('Participantes');
            $this->set('participantes', $this->Participantes->getList($uex));
            $this->set(compact('processo'));
            $this->set(compact('uex'));
            
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Unidade Executora inválida.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
}
