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

$this->extend('_processos');

$this->assign('content-description', 'Exclusão do Processo');

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($processo->participante->uex->id),
]);
$this->Html->addCrumb(h($processo->participante->uex->nome_reduzido), [
    'action' => 'listar',
    h($processo->participante->uex->id)
]);
$this->Html->addCrumb(h($processo->nomeFull), [
    'action' => 'visualizar',
    h($processo->id),   
]);
$this->Html->addCrumb('Exclusão');

echo $this->Box->create(['class' => 'box-danger']);

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação de exclusão do Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($processo->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<?= $this->form->create() ?>

<?php require_once '_processo_info.ctp'; ?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <p>
                Isso também excluirá todos os cardápios presentes no processo. Além disso, 
                este processo também será removido dos processos centralizados aos
                quais ele pertence.
            </p>
            <p>
                Você deseja excluir o processo <strong> <?= h($processo->nome) ?></strong>,
                partencente ao exercício <?= h($processo->participante->exercicio->ano) ?>?
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->form->salvar(['class' => 'btn-danger', 'icon' => 'excluir', 'text' => 'Excluir']) ?>
    </div>
</div>

<?= $this->form->end() ?>

<?= $this->Box->end(); ?>
