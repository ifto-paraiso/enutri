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

$this->assign('content-description', 'Editar Ingredientes');

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id),
]);
$this->Html->addCrumb(h($cardapio->processo->participante->uex->nome_reduzido), [
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id)
]);
$this->Html->addCrumb(h($cardapio->processo->nomeFull), [
    'action' => 'visualizar',
    h($cardapio->processo->id)
]);
$this->Html->addCrumb('Ingredientes do Cardápio');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Editar os Ingredientes do Cardápio',
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

echo $this->element('../Cardapios/_info', ['cardapio' => $cardapio]);

?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-5">
        <label>
            Nome do Alimento
        </label>
    </div>
    <div class="col-md-2">
        <label>
            Quantidade
        </label>
    </div>
    <div class="col-md-3">
        <label>
            Observações do Ingrediente
        </label>
    </div>
</div>

<script>
    
var count = <?php echo count($cardapio->ingredientes); ?>;

$('#ingredienteAdd').click(function(){
    count++;
    ingrediente.show();
    $('#ingredientes').append(ingrediente);
    console.log(count);
});

function ingredienteDelete(rowId)
{
    rowId = '#ingrediente-' + rowId;
    $(rowId).remove();
}

function ingredienteAdd()
{
    var id = 'ingrediente-' + (++count).toString(); //console.log(ingredienteId);
    var ingredienteId = '#' + id.toString();
    var ingrediente = $('#ingrediente').clone();
    ingrediente.attr('id', id);
    $('#ingredientes').append(ingrediente);
    
    var removeButton = $(ingredienteId + ' #ingredienteRemover');
    removeButton.attr('id', 'ingredienteRemover-' + count.toString());
    removeButton.attr('onClick', 'ingredienteDelete(' + count.toString() + ');');
    
    var inputAlimento = $(ingredienteId + ' #alimento-id');
    inputAlimento.attr('id', 'alimento-id-' + count.toString());
    inputAlimento.attr('name', 'ingredientes[' + count.toString() + '][alimento_id]');
    
    var inputQuantidade = $(ingredienteId + ' #quantidade');
    inputQuantidade.attr('id', 'quantidade-' + count.toString());
    inputQuantidade.attr('name', 'ingredientes[' + count.toString() + '][quantidade]');
    
    var inputObservacoes = $(ingredienteId + ' #observacoes');
    inputObservacoes.attr('id', 'observacoes-' + count.toString());
    inputObservacoes.attr('name', 'ingredientes[' + count.toString() + '][observacoes]');
    
    ingrediente.show();
    
    inputAlimento.focus();
    
    $('html, body').animate({
        scrollTop: $(document).height()
    }, 'slow');
}

$(document).ready(function(){
    $('#ingrediente').hide();
    if (count == 0) {
        ingredienteAdd();
    }
});

</script>

<?= $this->Form->create() ?>

<div id="ingredientes">
    
    <?php foreach($cardapio->ingredientes as $count => $ingrediente): ?>
        <div id="ingrediente-<?= $count+1 ?>" class="row">
            <?=
                $this->Form->hidden(sprintf('ingredientes[%d][id]', $count+1), [
                    'value' => $ingrediente->id,
                    'id'    => sprintf('ingrediente-id-%s', h($count+1)),
                ]);
            ?>
            <div class="col-md-2">
                <?=
                    $this->Button->make([
                        'icon'  => 'excluir',
                        'class' => 'btn-default btn-block',
                        'title' => 'Excluir este ingrediente',
                        'onClick' => sprintf('ingredienteDelete(%d)', $count+1),
                        'url' => 'javascript:void(0);',
                    ]);
                ?>
            </div>
            <div class="col-md-5">
                <?=
                    $this->Form->input(sprintf('ingredientes[%d][alimento_id]', $count+1), [
                        'type' => 'select',
                        'label' => false,
                        'value' => $ingrediente->alimento_id,
                        'id' => sprintf('alimento-id-%s', h($count+1)),
                        'options' => $alimentos,
                    ]);
                ?>
            </div>
            <div class="col-md-2 number">
                <?=
                    $this->Form->input(sprintf('ingredientes[%d][quantidade]', $count+1), [
                        'type' => 'text',
                        'label' => false,
                        'value' => $this->Formatter->float($ingrediente->quantidade),
                    ]);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                    $this->Form->input(sprintf('ingredientes[%d][observacoes]', $count+1), [
                        'type' => 'text',
                        'label' => false,
                        'value' => h($ingrediente->observacoes),
                    ]);
                ?>
            </div>
        </div>    
    <?php endforeach; ?>
    
    <div id="ingrediente" class="row">
        <div class="col-md-2">
            <?=
                $this->Button->make([
                    'icon'  => 'excluir',
                    'class' => 'btn-default btn-block',
                    'title' => 'Excluir este ingrediente',
                    'id'    => 'ingredienteRemover',
                    'url'   => 'javascript:void(0);',
                ])
            ?>
        </div>
        <div class="col-md-5">
            <?=
                $this->Form->input('alimento_id', [
                    'type' => 'select',
                    'label' => false,
                    'class' => 'alimentoId',
                    'name' => false,
                ]);
            ?>
        </div>
        <div class="col-md-2 number">
            <?=
                $this->Form->input('quantidade', [
                    'type' => 'text',
                    'label' => false,
                    'name' => false,
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?=
                $this->Form->input('observacoes', [
                    'type' => 'text',
                    'label' => false,
                    'name' => false,
                ]);
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12" style="text-align: right;">
        <?=
            $this->Button->make([
                'icon' => 'cadastrar',
                'text' => 'Inserir Ingrediente',
                'role' => 'button',
                'onClick'   => 'ingredienteAdd()',
                'url' => 'javascript:void(0);'
            ])
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?= $this->Form->end() ?>

<?= $this->Box->end() ?>