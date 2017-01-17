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

$nf = Cake\Core\Configure::read('numberFormat');

echo $this->Form->create($alimento);

?>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('nome', [
                'label' => 'Nome do Alimento',
                'autofocus'
            ]);
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Form->input('consumo_medida_id', [
                'label'   => 'Unid. Cons.',
                'type'    => 'select',
                'options' => $medidas,
                'title'   => 'Unidade de consumo',
            ]);
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Form->input('compra_medida_id', [
                'label'   => 'Unid. Compra',
                'type'    => 'select',
                'options' => $medidas,
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('fator', [
                'label' => 'Fator',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->fator), $nf),
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2 number">
        <?=
            $this->Form->input('kcal', [
                'label' => 'V. En. (kcal)',
                'type'  => 'text',
                'title' => 'Valor energético',
                'value'  => $this->Number->format(h($alimento->kcal), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('cho', [
                'label' => 'Carbo. (g)',
                'type'  => 'text',
                'title' => 'Carboidrato',
                'value'  => $this->Number->format(h($alimento->cho), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('ptn', [
                'label' => 'Proteína (g)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->ptn), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('lip', [
                'label' => 'Lipídeo (g)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->lip), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('ca', [
                'label' => 'Cálcio (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->ca), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('fe', [
                'label' => 'Ferro (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->fe), $nf),
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2 number">
        <?=
            $this->Form->input('mg', [
                'label' => 'Magnésio (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->mg), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('zn', [
                'label' => 'Zinco (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->zn), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('vita', [
                'label'  => 'Vit. A (&micro;g)',
                'type'   => 'text',
                'title'  => 'Vitamina A',
                'escape' => false,
                'value'  => $this->Number->format(h($alimento->vita), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('vitc', [
                'label'  => 'Vit. C (mg)',
                'type'   => 'text',
                'title'  => 'Vitamina C',
                'value'  => $this->Number->format(h($alimento->vitc), $nf),
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