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

$this->assign('content-description', 'Relação das centralizações');

$this->Html->addCrumb('Centralizações');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Centralizações',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Nova Centralização',
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
            <th style="width: 80px; text-align: center;">
                Exercício
            </th>
            <th>
                Centralização
            </th>
            <th style="width: 180px; text-align: center;">
                Quantidade de Processos
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($centralizacoes as $c): ?>
            <tr>
                <td style="text-align: center;">
                    <?= h($c->exercicio->ano) ?>
                </td>
                <td>
                    <?=
                        $this->Html->link(h($c->nome),
                            array(
                                'action' => 'visualizar',
                                h($c->id),
                            ),
                            array(
                                'title' => 'Visualizar informações da centralização',
                            )
                        );
                    ?>
                </td>
                <td style="text-align: center">
                    <?= h($c->qtdeProcessos) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($c->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar centralização',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($c->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar centralização',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($c->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir centralização',
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
