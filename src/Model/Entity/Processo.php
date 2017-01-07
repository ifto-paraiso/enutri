<?php

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;
use Enutri\Model\Util\Sanitize;

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
    
    /**
     * 
     * @return array
     * 
     * [
     *      'alimento_id' => [
     *          'nome' => 'Abacaxi'
     *      ]
     * ]
     * 
     */
    protected function _getPrevisao ()
    {
        $alimentos = [];
        
        foreach ($this->cardapios as $cardapio) {
            foreach ($cardapio->ingredientes as $ingrediente) {
                $alimentoId = $ingrediente->alimento->id;
                if (!isset($alimentos[$alimentoId])) {
                    $alimentos[$ingrediente->alimento->id] = [
                        'id'            => $ingrediente->alimento->id,
                        'nome'          => $ingrediente->alimento->nome,
                        'consumoMedida' => $ingrediente->alimento->consumo_medida->sigla,
                        'compraMedida'  => $ingrediente->alimento->compra_medida->sigla,
                        'fator'         => $ingrediente->alimento->fator,
                    ];
                }
                if (!isset($alimento['percapitas'][$ingrediente->quantidade])) {
                    $alimentos[$alimentoId]['percapitas'][$ingrediente->quantidade] = 0;
                }
                $alimentos[$alimentoId]['percapitas'][$ingrediente->quantidade] += $cardapio->frequencia;
            }
        }
        
        $publico = $this->publico;
        
        foreach ($alimentos as $alimentoId => $alimento) {
            $alimentos[$alimentoId]['percapitaGeral'] = 0;
            foreach ($alimento['percapitas'] as $percapita => $frequencia) {
                $alimentos[$alimentoId]['percapitaGeral'] += $percapita * $frequencia;
            }
            $alimentos[$alimentoId]['total'] = $alimentos[$alimentoId]['percapitaGeral'] * $publico;
            $alimentos[$alimentoId]['total'] /= $alimentos[$alimentoId]['fator'];
        }
        
        usort($alimentos, function($a , $b){
            return strcmp(
                Sanitize::removerAcentos($a['nome']),
                Sanitize::removerAcentos($b['nome'])
            );
        });
        
        return $alimentos;
    }
}
