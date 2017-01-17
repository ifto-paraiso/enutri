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

$this->assign('titulo', 'Previsão de Aquisição de Alimentos Centralizada');

?>


<table class="data">
    <thead style="display: table-header-group;">
        <tr>
            <th colspan="5">
                Alimentos Previstos
            </th>
        </tr>
        <tr>
            <th style="width: 20px;">
                #
            </th>
            <th>
                Nome do Alimento
            </th>
            <th style="width: 70px;">
                Total
            </th>
            <th style="width: 70px;">
                Preço Unitário
            </th>
            <th style="width: 70px;">
                Preço Total
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        <?php foreach($centralizacao->previsao as $alimento): ?>
        <tr>
            <td style="text-align: center;">
                <?= h($count++) ?>
            </td>
            <td>
                <?= h($alimento['nome']) ?>
            </td>
            <td class="number">
                <?= h($this->Formatter->float($alimento['total'], ['places' => 3, 'precision' => 3])) ?>
                <span class="medida">
                    <?= h($alimento['medida']) ?>
                </span>
            </td>
            <td class="number">
                
            </td>
            <td class="number">
                
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3">
                Totais
            </th>
            <th>
              
            </th>
            <th>
               
            </th>
        </tr>
    </tbody>
</table>
