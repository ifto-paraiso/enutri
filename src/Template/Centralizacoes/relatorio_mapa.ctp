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

$this->extend('_relatorio');

$this->assign('titulo', 'Mapa de Distribuição de Alimentos');

?>

<table class="data-container">
    <thead>
        <tr>
            <th style="width: 35%;">
                <table class="data">
                    <thead>
                        <tr>
                            <th>
                                Nome do Alimento
                            </th>
                        </tr>
                    </thead>
                </table>
            </th>
            <th>
                <table class="data">
                    <thead>
                        <tr>
                            <th style="width: 75%;">
                                Unidade Executora
                            </th>
                            <th>
                                Quantidade
                            </th>
                        </tr>
                    </thead>
                </table>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($centralizacao->mapa as $alimento): ?>
            <tr>
                <td style="vertical-align: text-top;">
                    <table class="data">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>
                                        <?= h($alimento['nome']) ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="vertical-align: text-top;">
                    <table class="data">
                        <tbody>
                            <?php foreach ($alimento['uexs'] as $uex): ?>
                            <tr>
                                <td style="width: 75%;">
                                    <?= h($uex['nome']) ?>
                                </td>
                                <td class="number">
                                    <?=
                                        h($this->Formatter->float($uex['quantidade'], [
                                            'precision' => 3,
                                            'places' => 3
                                        ]));
                                    ?>
                                    <span class="medida">
                                        <?= h($alimento['medida']) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: right; width: 75%;">
                                    <strong>
                                        Total
                                    </strong>
                                </td>
                                <td class="number">
                                    <strong>
                                        <?=
                                            h($this->Formatter->float($alimento['total'], [
                                                'precision' => 3,
                                                'places' => 3
                                            ]));
                                        ?>
                                        <span class="medida">
                                            <?= h($alimento['medida']) ?>
                                        </span>
                                    </strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
