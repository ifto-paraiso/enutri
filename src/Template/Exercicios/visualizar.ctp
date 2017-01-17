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

$this->extend('_exercicios');

$this->assign('content-description', 'Informações do Exercício');

$this->Html->addCrumb('Exercícios', ['action' => 'listar']);
$this->Html->addCrumb(h($exercicio->ano));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações do Exercício',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Listar Exercícios',
                        'icon' => 'voltar',
                        'url'  => ['action' => 'listar'],
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Adicionar Participante',
                        'icon' => 'inserir',
                        'url'  => [
                            'action' => 'participanteInserir',
                            h($exercicio->id),
                        ],
                    ),
                    array(
                        'text'  => 'Editar',
                        'icon'  => 'editar',
                        'title' => 'Editar Exercício',
                        'url'   => ['action' => 'editar', h($exercicio->id)],
                    ),
                    array(
                        'title' => 'Mais opções',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Excluir Exercício',
                                    'icon' => 'excluir',
                                    'url'  => [
                                        'action' => 'excluir',
                                        h($exercicio->id)
                                    ],
                                ),
                            ]
                        ]
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-2">
        <?= $this->Data->display('Ano', h($exercicio->ano)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Nome do Responsável', h($exercicio->responsavel_nome)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Função do Responsável', h($exercicio->responsavel_funcao)) ?>
    </div>
</div>

<fieldset>
    <legend>UExs Participantes</legend>
</fieldset>

<?php if(count($exercicio->participantes) < 1): ?>

    <div class="alert alert-warning">
        Nenhuma Unidade Executora está participando deste Exercício.
    </div>

<?php else: ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    Unidade Executora
                </th>
                <th>
                    Responsável
                </th>
                <th>
                    Função
                </th>
                <th class="options">
                    Opções
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($exercicio->participantes as $participante): ?>
                <tr>
                    <td>
                        <?= h($participante->uex->nome_reduzido) ?>
                    </td>
                    <td>
                        <?= h($participante->responsavel_nome) ?>
                    </td>
                    <td>
                        <?= h($participante->responsavel_funcao) ?>
                    </td>
                    <td class="options">
                        <?=
                            $this->Options->make([
                                array(
                                    'url'   => ['action' => 'participanteEditar', h($participante->id)],
                                    'icon'  => 'editar',
                                    'title' => 'Editar Participante',
                                ),
                                array(
                                    'url'   => ['action' => 'participanteRemover', h($participante->id)],
                                    'icon'  => 'excluir',
                                    'title' => 'Remover Participante',
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
