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

$this->extend('/Common/relatorio');

?>

<table style="width: 100%;">
    <thead style="display: table-header-group;">
        <tr>
            <td>
                <table class="data">
                    <tbody>
                        <tr>
                            <th colspan="3">
                                Informações do Processo
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 75%" colspan="2">
                                <strong>
                                    Unidade Executora:
                                </strong>
                                <?= h($processo->participante->uex->nome) ?>
                            </td>
                            <td>
                                <strong>
                                    Exercício:
                                </strong>
                                <?= h($processo->participante->exercicio->ano) ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%">
                                <strong>
                                    Processo:
                                </strong>
                                <?= h($processo->nome) ?>
                            </td>
                            <td style="width: 25%">
                                <strong>
                                    Público:
                                </strong>
                                <?= h($processo->publico) ?>
                            </td>
                            <td style="width: 25%">
                                <strong>
                                    Período:
                                </strong>
                                <?= h($processo->periodoText) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <strong>
                                    Observações:
                                </strong>
                                <?= h($processo->observacoes) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>               
                <br />
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= $this->fetch('content') ?>
            </td>
        </tr>
    </tbody>
    <tfoot style="display: table-footer-group;">
        <tr>
            <td>
                <?= $this->element('../Processos/_relatorio_assinaturas', ['processo' => $processo]) ?>
            </td>
        </tr>
    </tfoot>
</table>

