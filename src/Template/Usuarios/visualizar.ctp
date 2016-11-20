<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Informações do Usuário');

$this->Html->addCrumb('Usuários', ['action' => 'listar']);
$this->Html->addCrumb(h($usuario->nome));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações do Usuário',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Listar Usuários',
                        'icon' => 'voltar',
                        'url'  => ['action' => 'listar'],
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Alterar Senha',
                        'icon' => 'senha',
                        'url'  => [
                            'action' => 'alterar_senha',
                            h($usuario->id),
                        ],
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Editar',
                        'icon' => 'editar',
                        'url'  => ['action' => 'editar', h($usuario->id)],
                    ),
                    array(
                        'title' => 'Mais opções',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Redefinir Senha',
                                    'icon' => 'senha',
                                    'url'  => [
                                        'action' => 'redefinir_senha',
                                        h($usuario->id)
                                    ],
                                ),
                                array(
                                    'text' => 'Excluir',
                                    'icon' => 'excluir',
                                    'url'  => [
                                        'action' => 'excluir',
                                        h($usuario->id)
                                    ],
                                ),
                            ]
                        ]
                    )
                ]
            )
        ]
    ]
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-5">
        <?= $this->Data->display('Grupo', h($usuario->grupo->nome)) ?>
    </div>
    <div class="col-md-7">
        <?= $this->Data->display('Nome Completo', h($usuario->nome)) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <?= $this->Data->display('Email', h($usuario->email)) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Data->display('CRN', h($usuario->crn)) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <?= $this->Data->display('Endereço', h($usuario->endereco)) ?>
    </div>
    <div class="col-md-4">
        <?= $this->Data->display('CRN', h($usuario->bairro)) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $this->Data->display('Município', h($usuario->municipio)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('UF', h($usuario->uf->sigla)) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Data->display('Telefone', h($usuario->telefone1)) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Data->display('Celular', h($usuario->telefone2)) ?>
    </div>
</div>

<?php

echo $this->Box->end();
