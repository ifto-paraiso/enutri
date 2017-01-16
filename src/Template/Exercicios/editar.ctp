<?php

$this->extend('_exercicios');

$this->assign('content-description', 'Edição do Exercício');

$this->Html->addCrumb('Exercícios', ['action' => 'listar']);
$this->Html->addCrumb(h($exercicio->ano), ['action' => 'visualizar', h($exercicio->id)]);
$this->Html->addCrumb('Editar');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Edição do Exercício',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($exercicio->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

require_once '_form.ctp';

echo $this->Box->end();