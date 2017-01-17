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

$this->assign('content-description', 'Editar Atendimentos');

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
$this->Html->addCrumb('Atendimentos do Cardápio');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Editar o calendário do Cardápio',
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
    <div class="col-md-3">
        <label>
            Data do atendimento
        </label>
    </div>
</div>

<script>
    
var count = <?php echo count($cardapio->atendimentos); ?>;

var dpOptions = {
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
}

function atendimentoDelete(rowId)
{
    rowId = '#atendimento-' + rowId;
    $(rowId).remove();
}

function atendimentoAdd()
{
    count++;
    var id = 'atendimento-' + count.toString(); 
    var atendimentoId = '#' + id;
    var atendimento = $('#atendimento').clone();
    atendimento.attr('id', id);
    $('#atendimentos').append(atendimento);
    
    var removeButton = $(atendimentoId + ' #atendimentoRemover');
    removeButton.attr('id', 'atendimentoRemover-' + count.toString());
    removeButton.attr('onClick', 'atendimentoDelete(' + count.toString() + ');');
    
    var inputData = $(atendimentoId + ' #data');
    inputData.attr('id', 'data-' + count.toString());
    inputData.attr('name', 'atendimentos[' + count.toString() + '][data]');
    
    atendimento.show();
    
    inputData.each(function(){
        $(this).datepicker(dpOptions);
    });
    
    inputData.focus();
    
    $('html, body').animate({
        scrollTop: $(document).height()
    }, 'slow');
}

$(document).ready(function(){
    $('#atendimento').hide();
    if (count == 0) {
        atendimentoAdd();
    }
    $('input[id^="data-"]').each(function(){
        $(this).datepicker(dpOptions);
    });
});

</script>

<?= $this->Form->create() ?>

<div id="atendimentos">
    
    <?php foreach($cardapio->atendimentos as $count => $atendimento): ?>
        <div id="atendimento-<?= $count+1 ?>" class="row">
            <?=
                $this->Form->hidden(sprintf('atendimentos[%d][id]', $count+1), [
                    'value' => $atendimento->id,
                    'id'    => sprintf('atendimento-id-%s', h($count+1)),
                ]);
            ?>
            <div class="col-md-2">
                <?=
                    $this->Button->make([
                        'icon'  => 'excluir',
                        'class' => 'btn-default btn-block',
                        'title' => 'Excluir esta data',
                        'onClick' => sprintf('atendimentoDelete(%d)', $count+1),
                        'url' => 'javascript:void(0);',
                    ]);
                ?>
            </div>
            <div class="col-md-3">
                <?=
                    $this->Form->input(sprintf('atendimentos[%d][data]', $count+1), [
                        'type' => 'text',
                        'label' => false,
                        'value' => h($this->Formatter->date($atendimento->data)),
                        'id' => sprintf('data-%s', h($count+1)),
                    ]);
                ?>
            </div>
        </div>    
    <?php endforeach; ?>
    
    <div id="atendimento" class="row">
        <div class="col-md-2">
            <?=
                $this->Button->make([
                    'icon'  => 'excluir',
                    'class' => 'btn-default btn-block',
                    'title' => 'Excluir esta data',
                    'id'    => 'atendimentoRemover',
                    'url'   => 'javascript:void(0);',
                ])
            ?>
        </div>
        <div class="col-md-3">
            <?=
                $this->Form->input('data', [
                    'type' => 'text',
                    'label' => false,
                    'class' => 'datepicker',
                    'name' => false,
                    'id' => 'data',
                ]);
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5" style="text-align: right;">
        <?=
            $this->Button->make([
                'icon' => 'cadastrar',
                'text' => 'Inserir Data',
                'role' => 'button',
                'onClick'   => 'atendimentoAdd()',
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

<?= $this->Html->css('jquery-ui.min') ?>
<?= $this->Html->css('jquery-ui.structure.min') ?>
<?= $this->Html->css('jquery-ui.theme.min') ?>
<?= $this->Html->script('jquery-ui.min') ?>
