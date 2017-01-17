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

$this->assign('content-description', 'Informações do Alimento');

$this->Html->addCrumb('Alimentos', ['action' => 'listar']);
$this->Html->addCrumb(h($alimento->nome));

$nf = Cake\Core\Configure::read('numberFormat');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações do Alimento',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Listar Alimentos',
                        'icon' => 'voltar',
                        'url'  => ['action' => 'listar'],
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Editar',
                        'icon' => 'editar',
                        'url'  => ['action' => 'editar', h($alimento->id)],
                    ),
                    array(
                        'title' => 'Mais opções',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Excluir Alimento',
                                    'icon' => 'excluir',
                                    'url'  => [
                                        'action' => 'excluir',
                                        h($alimento->id)
                                    ],
                                ),
                            ]
                        ]
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('Nome do Alimento', h($alimento->nome)) ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Unid. Cons.',
                h($alimento->consumo_medida->sigla),
                ['title' => 'Unidade de consumo']
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Unid. Compra',
                h($alimento->compra_medida->sigla)
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Fator',
                $this->Number->format(h($alimento->fator), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'V. En. (kcal)',
                $this->Number->format(h($alimento->kcal), $nf),
                array(
                    'class' => 'number',
                    'title' => 'Valor energético',
                )
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Carbo. (g)',
                $this->Number->format(h($alimento->cho), $nf),
                array(
                    'class' => 'number',
                    'title' => 'Carboidrato',
                )
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Proteína (g)',
                $this->Number->format(h($alimento->ptn), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Lipídeo (g)',
                $this->Number->format(h($alimento->lip), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Cálcio (mg)',
                $this->Number->format(h($alimento->ca), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Ferro (mg)',
                $this->Number->format(h($alimento->fe), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Magnésio (mg)',
                $this->Number->format(h($alimento->mg), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Zinco (mg)',
                $this->Number->format(h($alimento->zn), $nf),
                ['class' => 'number']
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Vit. A (&micro;g)',
                $this->Number->format(h($alimento->vita), $nf),
                array(
                    'class' => 'number',
                    'title' => 'Vitamina A',
                )
            );
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Data->display(
                'Vit. C (mg)',
                $this->Number->format(h($alimento->vita), $nf),
                array(
                    'class' => 'number',
                    'title' => 'Vitamina C',
                )
            );
        ?>
    </div>
</div>

<?php

echo $this->Box->end();
