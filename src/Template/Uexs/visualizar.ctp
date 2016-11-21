<?php

$this->extend('_uexs');

$this->assign('content-description', 'Informações da Unidade Executora');

$this->Html->addCrumb('UExs', ['action' => 'listar']);
$this->Html->addCrumb(h($uex->nome_reduzido));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações da Unidade Executora',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Listar UExs',
                        'icon' => 'voltar',
                        'url'  => ['action' => 'listar'],
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Editar',
                        'icon' => 'editar',
                        'url'  => ['action' => 'editar', h($uex->id)],
                    ),
                    array(
                        'title' => 'Mais opções',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Excluir UEx',
                                    'icon' => 'excluir',
                                    'url'  => [
                                        'action' => 'excluir',
                                        h($uex->id)
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
    <div class="col-md-7">
        <?= $this->Data->display('Nome da Unidade Executora', h($uex->nome)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Nome Reduzido', h($uex->nome_reduzido)) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('email', h($uex->email)) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Data->display('Telefone', h($uex->telefone1)) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Data->display('Telefone Alternativo', h($uex->telefone2)) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('Endereço', h($uex->endereco)) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Data->display('Bairro', h($uex->bairro)) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $this->Data->display('Município', h($uex->municipio)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('UF', h($uex->uf->sigla)) ?>
    </div>
</div>

<?php

echo $this->Box->end();
