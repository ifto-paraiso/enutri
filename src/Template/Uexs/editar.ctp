<?php

$this->extend('_uexs');

$this->assign('content-description', 'Edição da UEx');

$this->Html->addCrumb('UExs', ['action' => 'listar']);
$this->Html->addCrumb(h($uex->nome_reduzido), ['action' => 'visualizar', h($uex->id)]);
$this->Html->addCrumb('Editar');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Edição de usuário',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'icon' => 'cancelar',
                        'text' => 'Cancelar',
                        'url'  => ['action' => 'visualizar', h($uex->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

require_once '_form.ctp';

echo $this->Box->end();