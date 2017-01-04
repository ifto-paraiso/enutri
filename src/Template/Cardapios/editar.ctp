<?php

$this->extend('_cardapios');

$this->assign('content-description', 'Edição do Cardápio');

$this->Html->addCrumb( 'Processos', [
    'controller' => 'Processos',
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id),
]);
$this->Html->addCrumb(h($cardapio->processo->participante->uex->nome_reduzido), [
    'controller' => 'Processos',
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id)
]);
$this->Html->addCrumb(h($cardapio->processo->nomeFull), [
    'controller' => 'Processos',
    'action' => 'visualizar',
    h($cardapio->processo->id),   
]);
$this->Html->addCrumb('Edição do Cardápio');

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
                            'action' => 'visualizar',
                            h($cardapio->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->element('../Processos/_processo_info', ['processo' => $cardapio->processo]);

echo $this->element('../Cardapios/_form', ['cardapio' => $cardapio]);

echo $this->Form->end();

echo $this->Box->end() ?>

