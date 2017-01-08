<?php

$this->extend('_processos');

$this->assign('content-description', 'Edição do Processo');

$processo = $processoModalidade->processo;

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($processo->participante->uex->id),
]);
$this->Html->addCrumb(h($processo->participante->uex->nome_reduzido), [
    'action' => 'listar',
    h($processo->participante->uex->id)
]);
$this->Html->addCrumb(h($processo->nomeFull), [
    'action' => 'visualizar',
    h($processo->id),   
]);
$this->Html->addCrumb('Inserir Modalidade');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Edição do Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cancelar',
                        'icon'  => 'cancelar',
                        'url'   => [
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

require_once '_processo_info.ctp';

require_once '_modalidade_form.ctp';

echo $this->Box->end();
