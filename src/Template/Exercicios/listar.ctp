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

$this->assign('content-description', 'Lista de Exercícios');

$this->Html->addCrumb('Exercícios');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Exercícios',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Exercício',
                        'icon'  => 'cadastrar',
                        'class' => 'btn-primary',
                        'url'   => ['action' => 'cadastrar'],
                    )
                ]
            )
        ]
    ]
]);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>
                Ano
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
        <?php foreach($exercicios as $exercicio): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($exercicio->ano),
                            ['action' => 'visualizar', h($exercicio->id)],
                            ['title' => 'Visualizar as informações do Exercício']
                        );
                    ?>
                </td>
                <td>
                    <?= h($exercicio->responsavel_nome) ?>
                </td>
                <td>
                    <?= h($exercicio->responsavel_funcao) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($exercicio->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Exercício',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($exercicio->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Exercício',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($exercicio->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Exercício',
                            )
                        ])
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php

echo $this->Box->end();

