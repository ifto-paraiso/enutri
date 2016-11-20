<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Edição de usuário');

$this->Html->addCrumb('Usuários', ['action' => 'listar']);
$this->Html->addCrumb(h($usuario->nome), ['action' => 'visualizar', h($usuario->id)]);
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
                        'url'  => ['action' => 'visualizar', h($usuario->id)],
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

require_once '_form.ctp';

echo $this->Box->end();