<?php

$this->extend('_exercicios');

$this->assign('content-description', 'Editar Participante');

$this->Html->addCrumb('Exercícios', ['action' => 'listar']);
$this->Html->addCrumb(h($participante->exercicio->ano), ['action' => 'visualizar', h($participante->exercicio->id)]);
$this->Html->addCrumb('Editar Participante');

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
                        'url'  => ['action' => 'visualizar', h($participante->exercicio->id)],
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
        <?= $this->Data->display('Ano', h($participante->exercicio->ano)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Nome do Responsável', h($participante->exercicio->responsavel_nome)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Função do Responsável', h($participante->exercicio->responsavel_funcao)) ?>
    </div>
</div>

<?php

require_once '_form_participante.ctp';

echo $this->Box->end();
