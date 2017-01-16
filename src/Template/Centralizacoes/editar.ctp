<?php

$this->extend('_centralizacoes');

$this->assign('content-description', 'Edição da Centralização');

$this->Html->addCrumb('Centralizações', ['action' => 'listar']);
$this->Html->addCrumb(h($centralizacao->nomeFull), [
    'action' => 'visualizar',
    h($centralizacao->id),
]);
$this->Html->addCrumb('Edição');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Edição da Centralização',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => [
                            'action' => 'visualizar',
                            h($centralizacao->id),
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->element('../Centralizacoes/_form', ['centralizacao' => $centralizacao]);

echo $this->Box->end();
