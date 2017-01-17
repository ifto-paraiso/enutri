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

$this->assign('content-description', 'Adicionar Participante');

$this->Html->addCrumb('Exercícios', ['action' => 'listar']);
$this->Html->addCrumb(h($exercicio->ano), ['action' => 'visualizar', h($exercicio->id)]);
$this->Html->addCrumb('Adicionar Participante');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Adicionar Participante',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => ['action' => 'visualizar', h($exercicio->id)],
                    )
                ]
            ),
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

<?php

require_once '_form_participante.ctp';

echo $this->Box->end();
