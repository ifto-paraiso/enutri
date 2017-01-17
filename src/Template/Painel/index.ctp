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

$this->extend('_painel');

$this->assign('content-icon', "painel");
$this->assign('content-title', "Bem vindo(a), {$user['nome']}");

?>

<div class="row">
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'planejamento',
                'text' => 'Planejamento',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'processo',
                'text' => 'Processos',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'processos',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'centralizacao',
                'text' => 'Centralizações',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'centralizacoes',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'eex',
                'text' => 'Entidade Executora',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'uex',
                'text' => 'Unidades Executoras',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'uexs',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'exercicio',
                'text' => 'Exercícios',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'exercicios',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'usuarios',
                'text' => 'Usuários',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'usuarios',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'alimento',
                'text' => 'Base Nutricional',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'alimento',
                'text' => 'Alimentos',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'alimentos',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'ajuda',
                'text' => 'Ajuda',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'manual',
                'text' => 'Manual do Sistema',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'ajuda',
                    'action'     => 'manual',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'sobre',
                'text' => 'Sobre o Enutri',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'ajuda',
                    'action'     => 'sobre',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
</div>