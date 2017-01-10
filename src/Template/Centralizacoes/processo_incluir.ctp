<?php

$this->extend('_centralizacoes');

$this->assign('content-description', 'Inclusão de Processos');

$this->Html->addCrumb('Centralizações', ['action' => 'listar']);
$this->Html->addCrumb(h($centralizacao->nomeFull), [
    'action' => 'visualizar',
    h($centralizacao->id),
]);
$this->Html->addCrumb('Inclusão de Processos');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Inclusão de Processos',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => [
                            'action' => 'visualizar',
                            h($centralizacao->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->element('../Centralizacoes/_centralizacao_info', ['centralizacao' => $centralizacao]);

echo $this->Form->create();

?>

<legend>
    <?= $this->Icon->make('processo') ?>
    Selecione os Processos
</legend>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar(['text' => 'Incluir os Processos selecionados']) ?>
    </div>
</div> 

<?= $this->Box->bodyEnd() ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th></th>
            <th>
                Unidade Executora
            </th>
            <th>
                Processo
            </th>
            <th>
                Modalidades de Ensino
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processos as $count => $processo): ?>
        <tr>
            <td class="td-checkbox">
                <?php 
                    echo $this->Form->hidden(
                        sprintf('processos[%d][processo_id]', $count),
                        array(
                            'value'  => h($processo->id),
                        )
                    );
                    echo $this->Form->input(
                        sprintf('processos[%d][incluir]', $count),
                        array(
                            'type'  => 'checkbox',
                            'label' => false,
                        )
                    );
                ?>
            </td>
            <td>
                <?= h($processo->participante->uex->nome_reduzido) ?>
            </td>
            <td>
                <?= h($processo->nome) ?>
            </td>
            <td>
                <?= h($processo->modalidades) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Box->body() ?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar(['text' => 'Incluir os Processos selecionados']) ?>
    </div>
</div>  

<?= $this->Form->end() ?>

<?= $this->Box->end() ?>
