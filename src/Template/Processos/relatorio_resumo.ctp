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

$this->assign('titulo', 'Resumo do Processo');

?>

<table class="data">
    <thead>
        <tr>
            <th>
                Modalidades de Ensino Atendidas
            </th>
            <th style="width: 100px;">
                Público
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processo->processo_modalidades as $modalidade): ?>
            <tr>
                <td>
                    <?= h($modalidade->modalidade->nome) ?>
                </td>
                <td class="number">
                    <?= h($modalidade->publico) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th style="text-align: right;">
                Público Total do Processo
            </th>
            <th class="number">
                <?= h($processo->publico) ?>
            </th>
        </tr>
    </tfoot>
</table>

<br />

<table class="data">
    <thead>
        <tr>
            <th colspan="3">
                Cardápios
            </th>
            <th style="width: 100px;">
                Frequência
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processo->cardapios as $count => $cardapio): ?>
            <tr>
                <td style="text-align: center; width: 20px;">
                    <?= h($count+1) ?>
                </td>
                <td style="text-align: center; width: 120px;">
                    <?= h($cardapio->cardapio_tipo->nome) ?>
                </td>
                <td>
                    <?= h($cardapio->nome) ?>
                </td>
                <td style="text-align: center;">
                    <?= h($cardapio->frequencia) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br />

<table class="data">
    <thead>
        <tr>
            <th colspan="3">
                Estatística
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 33.333%">
                <strong>
                    Total de Refeições:
                </strong>
                <?php 
                    $totalRefeicoes = $processo->totalRefeicoes;
                    echo h(number_format($totalRefeicoes, 0, ',', '.'));
                ?>
            </td>
            <td style="width: 33.333%">
                <strong>
                    Refeições/Dia (Média):
                </strong>
                <?php
                    $periodo = $processo->periodo;
                    $mediaDiaria = ($periodo == 0) ? (0) : ($totalRefeicoes / $periodo);
                    echo h(number_format($mediaDiaria, 2, ',', '.'));
                ?>
            </td>
            <td>
                <strong>
                    Refeições/Dia/Aluno (Média):
                </strong>
                <?php 
                    $publico = $processo->publico;
                    $mediaAluno = ($publico == 0) ? (0) : ($mediaDiaria / $publico);
                    echo h(number_format($mediaAluno, 2, ',', '.'));
                ?>
            </td>
        </tr>
    </tbody>
</table>

<div style="page-break-inside: avoid;">
    
    <h2>
        Informações Nutricionais (Média Diária)
    </h2>

    <?= $this->element('../Cardapios/_infonutri', ['nutrientes' => $processo->nutrientes]) ?>

</div>