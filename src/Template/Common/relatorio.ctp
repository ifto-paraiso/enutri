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

$relatoriosConfig = \Cake\Core\Configure::read('EEx.Relatorios');

$cabecalho = implode('<br />', $relatoriosConfig['cabecalho']);

?>

<table style="width: 100%;">
    <thead style="display: table-header-group;">
        <tr>
            <td colspan="2">
                <table>
                    <tbody>
                        <tr>
                            <td class="header-logo-wrapper">
                                <?= $this->Html->image('logo', ['class' => 'header-logo']) ?>
                            </td>
                            <td>
                                <?= $cabecalho ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h1 class="header-titulo">
                    <?= $this->fetch('titulo') ?>
                </h1>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
                <?= $this->fetch('content') ?>
            </td>
        </tr>
    </tbody>
    <tfoot style="display: table-footer-group">
        <tr>
            <td style="width: 50%;">
                ENUTRI - Versão
                <?= h(\Cake\Core\Configure::read('Version')) ?>
            </td>
            <td style="text-align: right">
                <?= h(\Cake\Routing\Router::url('/', true)) ?> 
            </td>
        </tr>
    </tfoot>
</table>
