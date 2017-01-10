<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entidade "Centralização"
 * 
 * @author Renato Uchôa <contato@renatouchoa.com.br>
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
}
