<?php

$this->extend('_cardapios');

$this->assign('content-description', 'Cadastro de Cardápio');

$this->Html->addCrumb( 'Processos', [
    'controller' => 'Processos',
    'action' => 'listar',
    h($processo->participante->uex->id),
]);
$this->Html->addCrumb(h($processo->participante->uex->nome_reduzido), [
    'controller' => 'Processos',
    'action' => 'listar',
    h($processo->participante->uex->id)
]);
$this->Html->addCrumb(h($processo->nomeFull), [
    'controller' => 'Processos',
    'action' => 'visualizar',
    h($processo->id),   
]);
$this->Html->addCrumb('Novo Cardápio');

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
                            'controller' => 'Processos',
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

echo $this->element('../Processos/_processo_info', ['processo' => $processo]);

echo $this->element('../Cardapios/_form', ['cardapio' => $cardapio]);

echo $this->Form->end();

echo $this->Box->end() ?>

