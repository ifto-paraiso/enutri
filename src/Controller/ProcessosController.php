<?php

namespace Enutri\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;
use Enutri\Model\Entity\Uex;

class ProcessosController extends AppController
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
            
            $this->verificarPermissao($uex);
            
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
            
            $this->verificarPermissao($processo->participante->uex);
            
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
            
            $this->verificarPermissao($uex);
            
            $this->loadModel('Participantes');
            $participantes = $this->Participantes->getList($uex);
            if (count($participantes) < 1) {
                $this->Flash->warning('Esta UEx não está participando de nenhum exercício.');
                return $this->redirect(['action' => 'listar', h($uex->id)]);
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
            $this->set(compact('participantes'));
            $this->set(compact('processo'));
            $this->set(compact('uex'));
            
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Unidade Executora inválida.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Exclusão do processo especificado
     * 
     * @param type $processoId
     * 
     * @return void
     */
    public function excluir ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if ($this->request->is(['post', 'put'])) {
                $uexId = $processo->participante->uex->id;
                if ($this->Processos->delete($processo)) {
                    $this->Flash->success('Processo excluído com sucesso.');
                    return $this->redirect(['action' => 'listar', $uexId]);
                }
                $this->Flash->error('Não foi possível excluir o processo.');
            }
            $this->set(compact('processo'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Edição das informações do processo especificado
     * 
     * @param int $processoId
     * 
     * @return void
     */
    public function editar ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if ($this->request->is(['post', 'put'])) {
                $this->Processos->patchEntity($processo, $this->request->data);
                if ($this->Processos->save($processo)) {
                    $this->Processos->reprovar($processo);
                    $this->Flash->success('As informações do processo foram atualizadas.');
                    return $this->redirect(['action' => 'visualizar', $processo->id]);
                }
                $this->Flash->error('Não foi possível salvar as alterações.');
            }
            $this->set(compact('processo'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Inserção de uma modalidade de ensino no processo especificado
     * 
     * @param int $processoId
     * 
     * @return void
     */
    public function modalidadeInserir ($processoId = null)
    {
        try {
            
            /*
             * Localiza o processo e verifica se o usuário possui permissão
             * para acessá-lo
             */
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            
            /*
             * Constroi a lista de modalidade de ensino, removendo as
             * modalidades que já estão incluídas no processo
             */
            $this->loadModel('Modalidades');
            $modalidades = $this->Modalidades->getList();
            foreach ($processo->processo_modalidades as $processoModalidade) {
                if (isset($modalidades[$processoModalidade->modalidade_id])) {
                    unset($modalidades[$processoModalidade->modalidade_id]);
                }
            }
            
            /*
             * Verifica se existe alguma modalidade a ser incluída no processo.
             * Se não houver nenhuma, informa ao usuário que todas as 
             * modalidades já estão incluídas
             */
            if (count($modalidades) < 1) {
                $this->Flash->warning('O processo já atende todas as modalidades de ensino.');
                return $this->redirect(['action' => 'visualizar', $processo->id]);
            }
            
            /*
             * Cria e salva a modalidade no processo, caso o usuário tenha
             * submetido o formulário
             */
            $this->loadModel('ProcessoModalidades');
            $processoModalidade = $this->ProcessoModalidades->newEntity();
            if ($this->request->is(['post', 'put'])) {
                $this->ProcessoModalidades->patchEntity($processoModalidade, $this->request->data);
                $processoModalidade->processo_id = $processo->id;
                if ($this->ProcessoModalidades->save($processoModalidade)) {
                    $this->Processos->reprovar($processo);
                    $this->Flash->success('A modalidade de ensino foi inserida no processo.');
                    return $this->redirect(['action' => 'visualizar', $processo->id]);
                }
                $this->Flash->error('Não foi possível inserir a modalidade no processo.');
            }
            
            /*
             * Envia as informações para a view
             */
            $this->set(compact('processo'));
            $this->set(compact('processoModalidade'));
            $this->set(compact('modalidades'));
            
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Edição da modalidade de ensino de um processo
     * 
     * @param int $processoModalidadeId
     * 
     * @return void
     */
    public function modalidadeEditar ($processoModalidadeId = null)
    {
        try {
            $this->loadModel('ProcessoModalidades');
            $processoModalidade = $this->ProcessoModalidades->localizar($processoModalidadeId);
            $this->verificarPermissao($processoModalidade->processo->participante->uex);
            if ($this->request->is(['post', 'put'])) {
                $this->ProcessoModalidades->patchEntity($processoModalidade, $this->request->data);
                if ($this->ProcessoModalidades->save($processoModalidade)) {
                    $this->Processos->reprovar($processo);
                    $this->Flash->success('As alterações foram salvas com sucesso.');
                    return $this->redirect(['action' => 'visualizar', $processoModalidade->processo->id]);
                }
                $this->Flash->error('Não foi possível salvar as alterações.');
            }
            $this->set(compact('processoModalidade'));
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Exclusão da modalidade de ensino de um processo
     * 
     * @param id $processoModalidadeId
     * 
     * @return void
     */
    public function modalidadeRemover($processoModalidadeId = null)
    {
        try {
            $this->loadModel('ProcessoModalidades');
            $processoModalidade = $this->ProcessoModalidades->localizar($processoModalidadeId);
            $this->verificarPermissao($processoModalidade->processo->participante->uex);
            $processo = clone($processoModalidade->processo);
            if ($this->ProcessoModalidades->delete($processoModalidade)) {
                $this->Processos->reprovar($processo);
                $this->Flash->success('A modalidade foi removida deste processo.');
            } else {
                $this->Flash->error('Não foi possível remover a modalidade deste processo.');
            }
            return $this->redirect(['action' => 'visualizar', $processo->id]);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Aprovação do processo especificado
     * 
     * @param int $processoId
     */
    public function aprovar ($processoId = null)
    {
        $this->avaliar($processoId, 'aprovado');
    }
    
    /**
     * Reprovação do processo especificado
     * 
     * @param int $processoId
     */
    public function reprovar ($processoId = null)
    {
        $this->avaliar($processoId, 'reprovado');
    }
    
    /**
     * Previsão de aquisição de alimentos para o processo especificado
     * 
     * @param int $processoId
     */
    public function relatorioPrevisao ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if (!$processo->aprovado) {
                $this->Flash->error('O processo ainda não foi aprovado.');
                return $this->redirect(['action' => 'visualizar', $processo->id]);
            }
            $this->viewBuilder()->layout('relatorio');
            $this->set(compact('processo'));
        } catch (Exception $ex) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Relatório: Relação de Cardápios do processo especificado
     * 
     * @param int $processoId
     */
    public function relatorioCardapios ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if (!$processo->aprovado) {
                $this->Flash->error('O processo ainda não foi aprovado.');
                return $this->redirect(['action' => 'visualizar', $processo->id]);
            }
            $this->viewBuilder()->layout('relatorio');
            $this->set(compact('processo'));
        } catch (Exception $ex) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Relatório: Calendário dos cardápios do processo especificado
     * 
     * @param int $processoId
     */
    public function relatorioCalendario ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if (!$processo->aprovado) {
                $this->Flash->error('O processo ainda não foi aprovado.');
                return $this->redirect(['action' => 'visualizar', $processo->id]);
            }
            $this->viewBuilder()->layout('relatorio');
            $this->set(compact('processo'));
        } catch (Exception $ex) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Relatório: Resumo das informações do processo especificado
     * 
     * @param int $processoId
     */
    public function relatorioResumo ($processoId = null)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if (!$processo->aprovado) {
                $this->Flash->error('O processo ainda não foi aprovado.');
                return $this->redirect(['action' => 'visualizar', $processo->id]);
            }
            $this->viewBuilder()->layout('relatorio');
            $this->set(compact('processo'));
        } catch (Exception $ex) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
    
    /**
     * Método genérico utilizado pelas actions para aprovar/reprovar um
     * processo
     * 
     * @param int $processoId
     * @param string $avaliacao
     * @return void
     */
    private function avaliar ($processoId, $avaliacao)
    {
        try {
            $processo = $this->Processos->localizar($processoId);
            $this->verificarPermissao($processo->participante->uex);
            if ($avaliacao === 'aprovado') {
                if ($this->Processos->aprovar($processo, $this->usuarioLogado)) {
                    $this->Flash->success('O processo foi aprovado.');
                } else {
                    $this->Flash->error('Não foi possível aprovar o processo.');
                }
            } else {
                if ($this->Processos->reprovar($processo)) {
                    $this->Flash->success('O processo agora está aguardando avaliação.');
                } else {
                    $this->Flash->error('Não foi possível reprovar o processo.');
                }
            }
            return $this->redirect(['action' => 'visualizar', h($processoId)]);
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Processo inválido.');
            return $this->redirect(['action' => 'selecionarUex']);
        }
    }
}
