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

$this->extend('_cardapios');

$this->assign('content-description', 'Edição do Cardápio');

$this->Html->addCrumb( 'Processos', [
    'controller' => 'Processos',
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id),
]);
$this->Html->addCrumb(h($cardapio->processo->participante->uex->nome_reduzido), [
    'controller' => 'Processos',
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id)
]);
$this->Html->addCrumb(h($cardapio->processo->nomeFull), [
    'controller' => 'Processos',
    'action' => 'visualizar',
    h($cardapio->processo->id),   
]);
$this->Html->addCrumb('Edição do Cardápio');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Cadastro de Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cancelar',
                        'icon'  => 'cancelar',
                        'url'   => [
                            'action' => 'visualizar',
                            h($cardapio->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->element('../Processos/_processo_info', ['processo' => $cardapio->processo]);

echo $this->element('../Cardapios/_form', ['cardapio' => $cardapio]);

echo $this->Form->end();

echo $this->Box->end() ?>

