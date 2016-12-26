<?php

$this->extend('_alimentos');

$this->assign('content-description', 'Informações do Alimento');

$this->Html->addCrumb('Alimentos', ['action' => 'listar']);
$this->Html->addCrumb(h($alimento->nome));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações do Alimento',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Listar Alimentos',
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
                        'url'  => ['action' => 'editar', h($alimento->id)],
                    ),
                    array(
                        'title' => 'Mais opções',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Excluir Alimento',
                                    'icon' => 'excluir',
                                    'url'  => [
                                        'action' => 'excluir',
                                        h($alimento->id)
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
    <div class="col-md-6">
        <?= $this->Data->display('Nome do Alimento', h($alimento->nome)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Unid. Consumo', h($alimento->consumo_medida->sigla)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Unid. Compra', h($alimento->compra_medida->sigla)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Fator', $this->Number->br(h($alimento->fator)), ['class' => 'number']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <?= $this->Data->display('V. Energ. (kcal)', $this->Number->br(h($alimento->kcal)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Carboidrato (g)', $this->Number->br(h($alimento->cho)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Proteína (g)', $this->Number->br(h($alimento->ptn)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Lipídeo (g)', $this->Number->br(h($alimento->lip)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Cálcio (mg)', $this->Number->br(h($alimento->ca)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Ferro (mg)', $this->Number->br(h($alimento->fe)), ['class' => 'number']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <?= $this->Data->display('Magnésio (mg)', $this->Number->br(h($alimento->mg)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Zinco (mg)', $this->Number->br(h($alimento->zn)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Vit. A (&micro;g)', $this->Number->br(h($alimento->vita)), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Vit. C (mg)', $this->Number->br(h($alimento->vitc)), ['class' => 'number']) ?>
    </div>
</div>

<?php

echo $this->Box->end();
