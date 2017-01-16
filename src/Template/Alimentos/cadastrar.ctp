<?php

$this->extend('_alimentos');

$this->assign('content-description', 'Cadastro de Alimento');

$this->Html->addCrumb('Alimentos', ['action' => 'listar']);
$this->Html->addCrumb('Cadastro');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Cadastro de Alimento',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Cancelar',
                        'icon' => 'cancelar',
                        'url'  => ['action' => 'listar'],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

require_once('_form.ctp');

echo $this->Box->end();