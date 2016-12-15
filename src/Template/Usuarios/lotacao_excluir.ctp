<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Remoção de Lotação');

$this->Html->addCrumb('Usuários', ['action' => 'listar']);
$this->Html->addCrumb(h($lotacao->usuario->nome), ['action' => 'visualizar', h($lotacao->usuario->id)]);
$this->Html->addCrumb('Remoção de Lotação');

echo $this->Box->create(['class' => 'box-danger']);

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação de remoção de Lotação',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($lotacao->usuario->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<?= $this->form->create() ?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            Você deseja remover a lotação do usuário <strong> <?= h($lotacao->usuario->nome) ?> </strong> na Unidade Executora <strong> <?= h($lotacao->uex->nome) ?> </strong> ?
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
