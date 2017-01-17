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

?>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <?= $this->Icon->make('usuario') ?>
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">
            <?= $user['nome'] ?>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <?=
                $this->Html->link(
                    $this->Icon->make('senha') . 'Alterar Senha',
                    array(
                        'controller' => 'Usuarios',
                        'action'     => 'alterar-senha',
                    ),
                    array(
                        'escape' => false,
                    )
                );
            ?>
        </li>
        <li>
            <?=
                $this->Html->link(
                    $this->Icon->make('logout') . 'Sair do Sistema',
                    array(
                        'controller' => 'Acesso',
                        'action'     => 'logout',
                        h($user['id']),
                    ),
                    array(
                        'escape'  => false,
                        'confirm' => 'Deseja sair do sistema?',
                    )
                );
            ?>
        </li>
    </ul>
</li>