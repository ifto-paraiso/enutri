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

$this->assign('content-description', 'Cadastro de Alimento');

$this->Html->addCrumb('Alimentos', ['action' => 'listar']);
$this->Html->addCrumb('Cadastro');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Cadastro de Alimento',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => ['action' => 'listar'],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

require_once('_form.ctp');

echo $this->Box->end();