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

$this->extend('_centralizacoes');

$this->assign('content-description', 'Inclusão de Processos');

$this->Html->addCrumb('Centralizações', ['action' => 'listar']);
$this->Html->addCrumb(h($centralizacao->nomeFull), [
    'action' => 'visualizar',
    h($centralizacao->id),
]);
$this->Html->addCrumb('Inclusão de Processos');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Inclusão de Processos',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => [
                            'action' => 'visualizar',
                            h($centralizacao->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->element('../Centralizacoes/_centralizacao_info', ['centralizacao' => $centralizacao]);

echo $this->Form->create();

?>

<legend>
    <?= $this->Icon->make('processo') ?>
    Selecione os Processos
</legend>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar(['text' => 'Incluir os Processos selecionados']) ?>
    </div>
</div> 

<?= $this->Box->bodyEnd() ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th></th>
            <th>
                Unidade Executora
            </th>
            <th>
                Processo
            </th>
            <th>
                Modalidades de Ensino
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processos as $count => $processo): ?>
        <tr>
            <td class="td-checkbox">
                <?php 
                    echo $this->Form->hidden(
                        sprintf('processos[%d][processo_id]', $count),
                        array(
                            'value'  => h($processo->id),
                        )
                    );
                    echo $this->Form->input(
                        sprintf('processos[%d][incluir]', $count),
                        array(
                            'type'  => 'checkbox',
                            'label' => false,
                        )
                    );
                ?>
            </td>
            <td>
                <?= h($processo->participante->uex->nome_reduzido) ?>
            </td>
            <td>
                <?= h($processo->nome) ?>
            </td>
            <td>
                <?= h($processo->modalidades) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Box->body() ?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar(['text' => 'Incluir os Processos selecionados']) ?>
    </div>
</div>  

<?= $this->Form->end() ?>

<?= $this->Box->end() ?>
