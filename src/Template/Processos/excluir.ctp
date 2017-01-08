<?php

$this->extend('_processos');

$this->assign('content-description', 'Exclusão do Processo');

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
$this->Html->addCrumb('Exclusão');

echo $this->Box->create(['class' => 'box-danger']);

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação de exclusão do Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($processo->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<?= $this->form->create() ?>

<?php require_once '_processo_info.ctp'; ?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <p>
                Isso também excluirá todos os cardápios presentes no processo. Além disso, 
                este processo também será removido dos processos centralizados aos
                quais ele pertence.
            </p>
            <p>
                Você deseja excluir o processo <strong> <?= h($processo->nome) ?></strong>,
                partencente ao exercício <?= h($processo->participante->exercicio->ano) ?>?
            </p>
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
