<?php

$this->extend('_processos');

$this->assign('content-description', 'Cadastro de Processo');

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($uex->id),
]);
$this->Html->addCrumb(h($uex->nome_reduzido), [
    'action' => 'listar',
    h($uex->id)
]);
$this->Html->addCrumb('Novo Processo');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Cadastro de Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cancelar',
                        'icon'  => 'cancelar',
                        'url'   => [
                            'action' => 'listar',
                            h($uex->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->Form->create($processo, ['novalidate' => true]);

?>

<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('Unidade Executora', h($uex->nome_reduzido)) ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Form->input('participante_id', [
                'type' => 'select',
                'label' => 'Exercício',
                'values' => $participantes,
                'autofocus',
            ]);
        ?>
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
        
    </div>
    <div class="col-md-2">
        
    </div>
    <div class="col-md-2">
        
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

