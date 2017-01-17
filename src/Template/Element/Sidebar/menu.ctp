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

<ul class="sidebar-menu">
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-clock-o"></i>
            <span>Planejamento</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('processo') . ' Processos',
                        ['controller' => 'processos'],
                        ['escape' => false]
                    );
                ?>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('centralizacao') . ' Centralizações',
                        ['controller' => 'centralizacoes'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-building"></i>
            <span>Entidade Executora</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('uex') . ' Unidades Executoras',
                        ['controller' => 'uexs'],
                        ['escape' => false]
                    );
                ?>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('exercicio') . ' Exercícios',
                        ['controller' => 'exercicios'],
                        ['escape' => false]
                    );
                ?>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('usuarios') . ' Usuários',
                        ['controller' => 'usuarios'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-apple"></i>
            <span>Base Nutricional</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('alimento') . ' Alimentos',
                        ['controller' => 'alimentos'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-question-circle"></i>
            <span>Ajuda</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-book"></i>
                    Manual do sistema
                </a>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('sobre') . ' Sobre o ENUTRI',
                        ['controller' => 'ajuda', 'action' => 'sobre'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
</ul>