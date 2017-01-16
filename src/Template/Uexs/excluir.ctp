<?php

$this->extend('_uexs');

$this->assign('content-description', 'Exclusão da UEx');

$this->Html->addCrumb('UExs', ['action' => 'listar']);
$this->Html->addCrumb(h($uex->nome), ['action' => 'visualizar', h($uex->id)]);
$this->Html->addCrumb('Excluir');

echo $this->Box->create(['class' => 'box-danger']);

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação de exclusão de Unidade Executora',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($uex->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<?= $this->form->create($uex) ?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            Você deseja excluir a Unidade Executora <strong> <?= h($uex->nome) ?> </strong> ?
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
