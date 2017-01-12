<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entidade "Centralização"
 */
class Centralizacao extends Entity
{
    /**
     * Obtém a quantidade de processos incluídos na centralização
     * 
     * @return int
     */
    protected function _getQtdeProcessos()
    {
        return count($this->centralizacao_processos);
    }
    
    /**
     * Obtém o público total a ser atendido pela centralização
     * 
     * @return int
     */
    protected function _getPublico()
    {
        $publico = 0;
        foreach ($this->centralizacao_processos as $centralizacaoProcesso) {
            $publico += $centralizacaoProcesso->processo->publico;
        }
        return $publico;
    }
    
    /**
     * Obtém a quantidade de dias atendidos pela centralização
     * 
     * @return int
     */
    protected function _getPeriodo()
    {
        $datas = []; 
        foreach ($this->centralizacao_processos as $centralizacaoProcesso) {
            foreach ($centralizacaoProcesso->processo->cardapios as $cardapio) {
                foreach ($cardapio->atendimentos as $atendimento) {
                    $datas[$atendimento->data->i18nFormat()] = true;
                }
            }
        }
        return count($datas);
    }
    
    /**
     * Obtém a quantidade de dias atendidos pela centralização em formato texto
     * Exemplo: "1 dia", "15 dias"...
     * 
     * @return string
     */
    protected function _getPeriodoFull()
    {
        $periodo = $this->periodo;
        return sprintf('%d %s', $periodo, $periodo == 1 ? 'dia' : 'dias');
    }
    
    /**
     * Obtém o nome da centralização junto com o ano do exercício
     * 
     * @return string
     */
    protected function _getNomeFull ()
    {
        return sprintf('%s (%s)', $this->nome, $this->exercicio->ano);
    }
    
    /**
     * Verifica se todos os processsos da centralização estão aprovados
     * 
     * @return boolean true, se todos os processos da centralização estiverem
     *                 aprovados.
     */
    protected function _getAprovada ()
    {
        foreach ($this->centralizacao_processos as $cp) {
            if (!$cp->processo->aprovado) {
                return false;
            }
        }
        return true;
    }
    
    /**
     * Obtém a totalização do público da centralização agrupada por modalidade
     * de ensino
     * 
     * @return array
     */
    protected function _getPublicoPorModalidade ()
    {
        $modalidades = [];
        foreach ($this->centralizacao_processos as $cp) {
            foreach ($cp->processo->processo_modalidades as $pm) {
                if (!isset($modalidades[$pm->modalidade->id])) {
                    $modalidades[$pm->modalidade->id] = [
                        'nome'    => $pm->modalidade->nome,
                        'publico' => 0,
                    ];
                }
                $modalidades[$pm->modalidade->id]['publico'] += $pm->publico;
            }
        }
        return $modalidades;
    }
    
    /**
     * Obtém a totalização do público da centralização agrupada por unidade
     * executora e por modalidade de ensino
     * 
     * @return array
     */
    protected function _getPublicoPorUexModalidade ()
    {
        $uexs= [];
        foreach ($this->centralizacao_processos as $cp) {
            $uexId = $cp->processo->participante->uex->id;
            if (!isset($uexs[$uexId])) {
                $uexs[$uexId]['nome'] = $cp->processo->participante->uex->nome;
                $uexs[$uexId]['publicoTotal'] = 0;
            }
            foreach ($cp->processo->processo_modalidades as $pm) {
                $modalidadeId = $pm->modalidade->id;
                if (!isset($uexs[$uexId]['modalidades'][$modalidadeId])) {                    
                    $uexs[$uexId]['modalidades'][$modalidadeId] = [
                        'nome'    => $pm->modalidade->nome,
                        'publico' => 0,
                    ];
                }
                $uexs[$uexId]['modalidades'][$modalidadeId]['publico'] += $pm->publico;
                $uexs[$uexId]['publicoTotal'] += $pm->publico;
            }
        }
        return $uexs;
    }
    
    /**
     * Obtém os dados do mapa de distribuição de alimentos
     * 
     * @return array
     */
    protected function _getMapa ()
    {
        $mapa = [];
        foreach ($this->centralizacao_processos as $cp) {
            $uex = $cp->processo->participante->uex;
            foreach ($cp->processo->previsao as $alimentoId => $alimento) {
                if (!isset($mapa[$alimentoId])) {
                    $mapa[$alimentoId] = [
                        'nome'   => $alimento['nome'],
                        'medida' => $alimento['compraMedida'],
                        'total'  => 0,
                        'uexs'   => [],
                    ];
                }
                if (!isset($mapa[$alimentoId]['uexs'][$uex->id])) {
                    $mapa[$alimentoId]['uexs'][$uex->id] = [
                        'nome'       => $uex->nome,
                        'quantidade' => 0,
                    ];
                }
                $mapa[$alimentoId]['uexs'][$uex->id]['quantidade'] += $alimento['total'];
                $mapa[$alimentoId]['total'] += $alimento['total'];
            }
        }
        return $mapa;
    }
}
