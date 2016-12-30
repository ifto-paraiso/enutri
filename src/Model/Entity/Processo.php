<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;

class Processo extends Entity
{
    /**
     * Retorna todas as modalidades de ensino atendidas pelo processo
     * concatenadas e separadas por vírgula
     * 
     * @return string
     */
    protected function _getModalidades()
    {
        $modalidades = [];
        foreach ($this->processo_modalidades as $processoModalidade) {
            $modalidades[] = h($processoModalidade->modalidade->nome_reduzido);
        }
        return implode(', ', $modalidades);
    }
    
    /**
     * Retorna o público total do processo
     * 
     * @return int
     */
    protected function _getPublico()
    {
        $publico = 0;
        foreach ($this->processo_modalidades as $processoModalidade) {
            $publico += $processoModalidade->publico;
        }
        return $publico;
    }
    
    /**
     * Retorna a qualtidade de dias atendidos pelo processo
     * 
     * @return int
     */
    protected function _getPeriodo ()
    {
        $dias = [];
        foreach ($this->cardapios as $cardapio) {
            foreach ($cardapio->atendimentos as $atendimento) {
                $dias[$atendimento->data->i18nFormat()] = true;
            }
        }
        return count($dias);
    }
    
    /**
     * Retorna a quantidade de dias acompanhado de 'dia' ou 'dias'
     * 
     * @return string
     */
    protected function _getPeriodoText ()
    {
        $periodo = $this->periodo;
        return sprintf('%d %s', $periodo, $periodo == 1 ? 'dia' : 'dias');
    }
    
    /**
     * Retorna o nome do processo seguido do ano do exercício
     * 
     * @return string
     */
    protected function _getNomeFull ()
    {
        return sprintf('%s (%s)', $this->nome, $this->participante->exercicio->ano);
    }
}
