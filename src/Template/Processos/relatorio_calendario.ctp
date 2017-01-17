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

$this->assign('titulo', 'Calendário de Cardápios');

?>

<table  style="width: 100%;">
    <thead class="data-container-header">
        <tr>
            <th style="width: 120px;">
                Data
            </th>
            <th>
                Cardápios
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processo->calendario as $data): ?>
            <tr  style="page-break-inside: avoid;">
                <td style="vertical-align: text-top;">
                    <table class="data" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>
                                    <?= h($this->Formatter->dateWeek($data['data'])) ?>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </td>
                <td>
                    <table class="data" style="margin-top: 10px;">
                        <tbody>
                            <?php foreach ($data['cardapios'] as $cardapio): ?>
                                <tr>
                                    <td style="width: 120px; text-align: center;">
                                        <?= h($cardapio['tipo']) ?>
                                    </td>
                                    <td>
                                        <?= h($cardapio['nome']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
