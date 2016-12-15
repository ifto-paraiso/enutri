<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Informações do Usuário');

$this->Html->addCrumb('Usuários', ['action' => 'listar']);
$this->Html->addCrumb(h($usuario->nome), ['action' => 'visualizar', h($usuario->id)]);
$this->Html->addCrumb('Lotação');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Lotação de Usuário',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => ['action' => 'visualizar', h($usuario->id)],
                    )
                ]
            ),
        ]
    ]
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-5">
        <?= $this->Data->display('Grupo', h($usuario->grupo->nome)) ?>
    </div>
    <div class="col-md-7">
        <?= $this->Data->display('Nome Completo', h($usuario->nome)) ?>
    </div>
</div>

<?= $this->Form->create($lotacao) ?>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('uex_id', [
                'type'    => 'select',
                'label'   => 'Unidade Executora',
                'options' => $uexs,
                'autofocus',
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

<?php

echo $this->Box->end();
