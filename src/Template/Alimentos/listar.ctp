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

$this->extend('_alimentos');

$this->assign('content-description', 'Lista de alimentos');

$this->Html->addCrumb('Alimentos');

$nf = Cake\Core\Configure::read('numberFormat');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Alimentos',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Alimento',
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
                Nome do Alimento
            </th>
            <th style="width: 80px;">
                Kcal
            </th>
            <th style="width: 80px;">
                CHO (mg)
            </th>
            <th style="width: 80px;">
                PTN (mg)
            </th>
            <th style="width: 80px;">
                LIP (mg)
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alimentos as $alimento): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($alimento->nome),
                            ['action' => 'visualizar', h($alimento->id)],
                            ['title' => 'Visualizar as informações do alimento']
                        );
                    ?>
                </td>
                <td class="number">
                    <?= $this->Number->format(h($alimento->kcal), $nf) ?>
                </td>
                <td class="number">
                    <?= $this->Number->format(h($alimento->cho), $nf) ?>
                </td>
                <td class="number">
                    <?= $this->Number->format(h($alimento->ptn), $nf) ?>
                </td>
                <td class="number">
                    <?= $this->Number->format(h($alimento->lip), $nf) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($alimento->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Alimento',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($alimento->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Alimento',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($alimento->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Alimento',
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

