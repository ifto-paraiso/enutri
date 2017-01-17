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

$this->assign('content-description', 'Lista de Processos');

$this->Html->addCrumb('Processos', ['action' => 'selecionarUex']);
$this->Html->addCrumb(h($uex->nome_reduzido));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Processos',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Selecionar UEx',
                        'icon'  => 'voltar',
                        'url'   => ['action' => 'selecionarUex'],
                    ),
                ],
            ),
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Processo',
                        'icon'  => 'cadastrar',
                        'class' => 'btn-primary',
                        'url'   => [
                            'action' => 'cadastrar',
                            h($uex->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('Unidade Executora', h($uex->nome_reduzido)) ?>
    </div>
</div>

<?php if (count($processos->toArray()) < 1): ?>
    <div class="alert alert-info">
        Esta Unidade Executora não possui nenhum processo cadastrado.
    </div>
<?php endif; ?>

<?= $this->Box->bodyEnd(); ?>

<?php if (count($processos->toArray()) > 0): ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="text-align: center; width: 100px;">
                    Exercício
                </th>
                <th>
                    Processo
                </th>
                <th style="text-align: center;">
                    Situação
                </th>
                <th>
                    Modalidades
                </th>
                <th style="text-align: right; width: 80px;">
                    Período
                </th>
                <th style="text-align: right; width: 80px;">
                    Público
                </th>
                <th class="options">
                    Opções
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($processos as $processo): ?>
                <tr>
                    <td style="text-align: center;">
                        <?= h($processo->participante->exercicio->ano) ?>
                    </td>
                    <td>
                        <?=
                            $this->Html->link(
                                h($processo->nome),
                                ['action' => 'visualizar', h($processo->id)],
                                ['title' => 'Visualizar as informações deste processo']
                            );
                        ?>
                    </td>
                    <td style="text-align: center;">
                        <?php
                            if ($processo->aprovado) {
                                echo $this->Label->success('Aprovado');
                            } else {
                                echo $this->Label->default('Não avaliado');
                            }
                        ?>
                    </td>
                    <td>
                        <?= h($processo->modalidades) ?>
                    </td>
                    <td class="number">
                        <?= h($processo->periodoText)  ?>
                    </td>
                    <td class="number">
                        <?= h($processo->publico)  ?>
                    </td>
                    <td class="options">
                        <?=
                            $this->Options->make([
                                array(
                                    'url'   => ['action' => 'visualizar', h($processo->id)],
                                    'icon'  => 'visualizar',
                                    'title' => 'Visualizar Processo',
                                ),
                                array(
                                    'url'   => ['action' => 'editar', h($processo->id)],
                                    'icon'  => 'editar',
                                    'title' => 'Editar Processo',
                                ),
                                array(
                                    'url'   => ['action' => 'excluir', h($processo->id)],
                                    'icon'  => 'excluir',
                                    'title' => 'Excluir Processo',
                                )
                            ])
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php

echo $this->Box->end();

