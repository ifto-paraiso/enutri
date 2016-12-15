<?php

$this->extend('_uexs');

$this->assign('content-description', 'Cadastro de Unidade Executora');

$this->Html->addCrumb('UExs', ['action' => 'listar']);
$this->Html->addCrumb('Cadastro');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Cadastro de Unidade Executora',
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