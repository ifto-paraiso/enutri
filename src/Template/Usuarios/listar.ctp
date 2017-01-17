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

$this->extend('_usuarios');

$this->assign('content-description', 'Lista de usuários');

$this->Html->addCrumb('Usuários');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Usuários',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Usuário',
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
                Nome do Usuário
            </th>
            <th>
                Grupo
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($usuario->nome),
                            ['action' => 'visualizar', h($usuario->id)],
                            ['title' => 'Visualizar as informações do usuário']
                        );
                    ?>
                </td>
                <td>
                    <?= h($usuario->grupo->nome) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($usuario->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Usuário',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($usuario->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Usuário',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($usuario->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Usuário',
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

