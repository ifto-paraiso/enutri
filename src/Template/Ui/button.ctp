<?php

$this->extend('_ui');
$this->assign('content-description', 'ButtonHelper');

?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">
                    ButtonHelper
                </h3>
                <div class="box-tools">
                    <?= $this->Button->default('Ação voltar', ['icon' => 'voltar']) ?>
                    <div class="btn-group">
                        <?= $this->Button->default('Cadastrar', ['icon' => 'cadastrar']) ?>
                        <?= $this->Button->default('Cadastrar', ['icon' => 'cadastrar']) ?>
                        <?= $this->Button->default('Cadastrar', ['icon' => 'cadastrar']) ?>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?= $this->Button->default('Cadastrar', ['icon' => 'cadastrar']) ?>
                <br /><br />
                <?= $this->Button->olive('Editar', ['icon' => 'editar', 'flat' => true]) ?>
                <br /><br />
                <?= $this->Button->olive('Editar', ['icon' => 'excluir', 'tag' => 'button']) ?>
                <br /><br />
                <?= $this->Button->olive('Editar', ['icon' => 'cancelar', 'block' => true]) ?>
                <br /><br />
                <?= $this->Button->submit() ?>
            </div>
        </div>
    </div>
</div>