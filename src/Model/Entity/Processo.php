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

namespace Enutri\Model\Entity;

use Cake\ORM\Entity;
use Enutri\Model\Util\Sanitize;

/**
 * Entidade "Processo"
 * 
 */
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
     * Obtém a relação de alimentos previstos no processo
     * 
     * @return array
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
    
    /**
     * Obtém a relação de cardápios do processo relacionados, agrupados e
     * ordenados pela data de atendimento
     * 
     * @return array
     */
    protected function _getCalendario()
    {
        $datas = [];
        
        foreach ($this->cardapios as $cardapio) {
            foreach ($cardapio->atendimentos as $atendimento) {
                $data = $atendimento->data->i18nFormat('y-MM-DD');
                if (!isset($datas[$data])) {
                    $datas[$data]['data'] = $atendimento->data;
                }
                $datas[$data]['cardapios'][] = [
                    'tipo' => $cardapio->cardapio_tipo->nome,
                    'nome' => $cardapio->nome,
                ];
            }
        }
        
        ksort($datas);
        
        return $datas;
    }
    
    /**
     * Obtém o total de refeições previstas no processo
     * 
     * @return int
     */
    protected function _getTotalRefeicoes()
    {
        $total = 0;
        $publico = $this->publico;
        foreach ($this->cardapios as $cardapio) {
            $total += $cardapio->frequencia * $publico;
        }
        return $total;
    }
    
    /**
     * Obtém a quantidade média diária de cada nutriente servido por dia 
     * no processo
     * 
     * @return array
     */
    protected function _getNutrientes()
    {
        $nutrientesProcesso = [];
        foreach ($this->cardapios as $cardapio) {
            $nutrientesCardapio = $cardapio->nutrientes;
            foreach ($nutrientesCardapio as $nutrienteAlias => $quantidade) {
                $totalNutriente = $quantidade * $cardapio->frequencia;
                if (!isset($nutrientesProcesso[$nutrienteAlias])) {
                    $nutrientesProcesso[$nutrienteAlias] = $totalNutriente;
                } else {
                    $nutrientesProcesso[$nutrienteAlias] += $totalNutriente;
                }
            }
        }
        $periodo = $this->periodo;
        foreach ($nutrientesProcesso as $nutrienteAlias => $quantidade) {
            $nutrientesProcesso[$nutrienteAlias] /= $periodo;
        }
        return $nutrientesProcesso;
    }
}
