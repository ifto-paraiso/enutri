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
                            <th colspan="4">
                                Informações da Centralização
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                <strong>
                                    Exercício:
                                </strong>
                                <?= h($centralizacao->exercicio->ano) ?>
                            </td>
                            <td style="width: 40%;">
                                <strong>
                                    Centralização:
                                </strong>
                                <?= h($centralizacao->nome) ?>
                            </td>
                            <td style="width: 20%;">
                                <strong>
                                    Público Total:
                                </strong>
                                <?= h($centralizacao->publico) ?>
                            </td>
                            <td style="width: 20%;">
                                <strong>
                                    Período Total:
                                </strong>
                                <?= h($centralizacao->periodo) ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                <strong>
                                    Nº de Processos:
                                </strong>
                                <?= h($centralizacao->qtdeProcessos) ?>
                            </td>
                            <td colspan="3">
                                <strong>
                                    Observações:
                                </strong>
                                <?= h($centralizacao->observacoes) ?>
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
                <?= $this->element('../Centralizacoes/_relatorio_assinaturas', ['centralizacao' => $centralizacao]) ?>
            </td>
        </tr>
    </tfoot>
</table>

