<?php

$this->extend('_centralizacoes');

$this->assign('content-description', 'Exclusão da Centralização');

$this->Html->addCrumb('Centralizações', ['action' => 'listar']);
$this->Html->addCrumb(h($centralizacao->nomeFull), [
    'action' => 'visualizar',
    h($centralizacao->id),
]);

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação de exclusão da Centralização',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => [
                            'action' => 'visualizar',
                            h($centralizacao->id)
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

?>

<?= $this->form->create() ?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            Você deseja excluir a Centralização <strong> <?= h($centralizacao->nomeFull) ?> </strong> ?
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->form->salvar(['class' => 'btn-danger', 'icon' => 'excluir', 'text' => 'Excluir']) ?>
    </div>
</div>

<?= $this->form->end() ?>

<?= $this->Box->end(); ?>
