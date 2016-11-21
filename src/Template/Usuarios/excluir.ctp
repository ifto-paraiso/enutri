<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Exclusão de usuário');

$this->Html->addCrumb('Usuários', ['action' => 'listar']);
$this->Html->addCrumb(h($usuario->nome), ['action' => 'visualizar', h($usuario->id)]);
$this->Html->addCrumb('Excluir');

echo $this->Box->create(['class' => 'box-danger']);

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação de exclusão de usuário',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($usuario->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<?= $this->form->create($usuario) ?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            Você deseja excluir o usuário <strong> <?= h($usuario->nome) ?> </strong> ?
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
