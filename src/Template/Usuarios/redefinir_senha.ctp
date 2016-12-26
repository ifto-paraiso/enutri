<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Redefinição de senha');

$this->Html->addCrumb('Usuários', ['action' => 'listar']);
$this->Html->addCrumb(h($usuario->nome), ['action' => 'visualizar', h($usuario->id)]);
$this->Html->addCrumb('Redefinir senha');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Alteração de senha',
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

echo $this->Form->create($usuario);

?>

<div class="row">
    <div class="col-md-5">
        <?= $this->Data->display('Grupo', h($usuario->grupo->nome)) ?>
    </div>
    <div class="col-md-7">
        <?= $this->Data->display('Nome Completo', h($usuario->nome)) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <?= $this->Form->input('senha', ['autofocus', 'label' => 'Nova senha', 'value' => '', 'type' => 'password']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('senha2', ['label' => 'Repita a nova senha', 'value' => '', 'type' => 'password']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?php

echo $this->Form->end();

echo $this->Box->end();
