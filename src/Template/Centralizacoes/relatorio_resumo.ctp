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

$this->assign('titulo', 'Resumo da Centralização');

?>

<h2>
    Totalização por Unidade Executora
</h2>

<table class="data-container">
    <thead>
        <tr>
            <td style="width: 50%;">
                <table class="data">
                    <thead>
                        <tr>
                            <th>
                                Unidade Executora
                            </th>
                        </tr>
                    </thead>
                </table>
            </td>
            <td>
                <table class="data">
                    <thead>
                        <tr>
                            <th style="width: 70%;">
                                Modalidade de Ensino
                            </th>
                            <th>
                                Público
                            </th>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($centralizacao->publicoPorUexModalidade as $uex): ?>
            <tr>
                <td style="vertical-align: text-top;">
                    <table class="data">
                        <tbody>
                            <tr>
                                <td style="width: 70%;">
                                    <strong>
                                        <?= h($uex['nome']) ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table class="data">
                        <tbody>
                            <?php foreach ($uex['modalidades'] as $modalidade): ?>
                                <tr>
                                    <td style="width: 70%;">
                                        <?= h($modalidade['nome']) ?>
                                    </td>
                                    <td class="number">
                                        <?= h($modalidade['publico']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 70%; text-align: right;">
                                    <strong>
                                        Público Total
                                    </strong>
                                </th>
                                <th class="number">
                                    <strong>
                                        <?= h($uex['publicoTotal']) ?>
                                    </strong>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>
    Totalização por Modalidade de Ensino
</h2>

<table class="data">
    <thead>
        <tr>
            <th style="width: 85%;">
                Modalidade de Ensino
            </th>
            <th>
                Público
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($centralizacao->publicoPorModalidade as $modalidade): ?>
        <tr>
            <td>
                <?= h($modalidade['nome']) ?>
            </td>
            <td class="number">
                <?= h($modalidade['publico']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>
                Público Total
            </th>
            <th class="number">
                <?= h($centralizacao->publico) ?>
            </th>
        </tr>
    </tfoot>
</table>
