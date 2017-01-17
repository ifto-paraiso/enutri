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

<?= $this->Form->create($participante) ?>

<div class="row">
    <div class="col-md-6">
        <?php
            if ($this->request->params['action'] === 'participanteInserir') {
                echo $this->Form->input('uex_id', [
                    'type'    => 'select',
                    'label'   => 'Unidade Executora',
                    'options' => $uexs,
                    'autofocus',
                ]);
            } else {
                echo $this->Data->display(
                    'Função do Responsável',
                    h($participante->uex->nome_reduzido)
                );
            }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('responsavel_nome', [
                'label'   => 'Nome do Responsável',
                'autofocus',
            ]);
        ?>
    </div>
    <div class="col-md-6">
        <?=
            $this->Form->input('responsavel_funcao', [
                'label'   => 'Função do Responsável',
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?= $this->Form->end() ?>