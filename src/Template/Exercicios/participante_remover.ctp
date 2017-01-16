<?php

$this->extend('_exercicios');

$this->assign('content-description', 'Remção da UEx do Exercício');

$this->Html->addCrumb('Exercícios', ['action' => 'listar']);
$this->Html->addCrumb(h($participante->exercicio->ano), ['action' => 'visualizar', h($participante->exercicio->id)]);
$this->Html->addCrumb('Remover Participante');

echo $this->Box->create(['class' => 'box-danger']);

echo $this->Box->header([
    'icon' => 'excluir',
    'text' => 'Confirmação da remoção da UEx',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($participante->exercicio->id)],
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
            Você deseja remover a UEx <strong> <?= h($participante->uex->nome) ?> </strong>
            do Exercício <strong><?= h($participante->exercicio->ano) ?></strong> ?
            Essa operação apagará todos os Processos.
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
