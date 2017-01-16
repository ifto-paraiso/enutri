<?php

$this->extend('_exercicios');

$this->assign('content-description', 'Adicionar Participante');

$this->Html->addCrumb('Exercícios', ['action' => 'listar']);
$this->Html->addCrumb(h($exercicio->ano), ['action' => 'visualizar', h($exercicio->id)]);
$this->Html->addCrumb('Adicionar Participante');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Adicionar Participante',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => ['action' => 'visualizar', h($exercicio->id)],
                    )
                ]
            ),
        ]
    ]
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-2">
        <?= $this->Data->display('Ano', h($exercicio->ano)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Nome do Responsável', h($exercicio->responsavel_nome)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Função do Responsável', h($exercicio->responsavel_funcao)) ?>
    </div>
</div>

<?php

require_once '_form_participante.ctp';

echo $this->Box->end();
