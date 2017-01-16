<?php

$this->extend('_processos');

$this->assign('content-description', 'Edição do Processo');

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($processo->participante->uex->id),
]);
$this->Html->addCrumb(h($processo->participante->uex->nome_reduzido), [
    'action' => 'listar',
    h($processo->participante->uex->id)
]);
$this->Html->addCrumb(h($processo->nomeFull), [
    'action' => 'visualizar',
    h($processo->id),   
]);
$this->Html->addCrumb('Edição');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Edição do Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cancelar',
                        'icon'  => 'cancelar',
                        'url'   => [
                            'action' => 'visualizar',
                            h($processo->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->Form->create($processo);

?>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Data->display(
                'Unidade Executora',
                h($processo->participante->uex->nome_reduzido)
            );
        ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Exercício', h($processo->participante->exercicio->ano)) ?>
    </div>
    <div class="col-md-4">
        <?=
            $this->Form->input('nome', [
                'type' => 'text',
                'label' => 'Processo',
                'autofocus',
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?= $this->Data->display('Modalidades de Ensino', h($processo->modalidades)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Público', h($processo->publico), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Período', h($processo->periodoText)) ?>
    </div>
    <div class="col-md-4">
        <?=
            $this->Form->input('observacoes', [
                'type' => 'text',
                'label' => 'Observações',
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?php

echo $this->Form->end();

echo $this->Box->end() ?>

