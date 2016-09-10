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
                    <?= $this->Button->default(['icon' => 'voltar', 'text' => 'Voltar']) ?>
                    <div class="btn-group">
                        <?= $this->Button->default(['icon' => 'cadastrar', 'text' => 'Cadastrar']) ?>
                        <?= $this->Button->default(['icon' => 'cadastrar', 'text' => 'Cadastrar']) ?>
                        <?= $this->Button->default(['icon' => 'cadastrar', 'text' => 'Cadastrar']) ?>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?= $this->Button->default(['icon' => 'voltar', 'text' => 'Voltar']) ?>
                <div class="btn-group">
                    <?= $this->Button->default(['icon' => 'cadastrar', 'text' => 'Cadastrar']) ?>
                    <?= $this->Button->default(['icon' => 'cadastrar', 'text' => 'Cadastrar']) ?>
                    <?= $this->Button->default(['icon' => 'cadastrar', 'text' => 'Cadastrar']) ?>
                </div>
                <br /><br />
                <?=
                    $this->ButtonGroup->make([
                        'buttons' => [
                            array(
                                'text' => 'Botão 1',
                                'icon' => 'voltar',
                            ),
                            array(
                                'text' => 'Botão 2',
                                'icon' => 'cadastrar',
                            )
                        ],
                    ]);
                ?>
                <h3>
                    Toolbar
                </h3>
                <?=
                    $this->Toolbar->make(['groups' => [
                        array(
                            'buttons' => [
                                array(
                                    'text' => 'Opção 1.1',
                                    'icon' => 'centralizacao',
                                ),
                                array(
                                    'text' => 'Opção 1.2',
                                ),
                            ],
                        ),
                        array(
                            'buttons' => [
                                array(
                                    'text' => 'Opção 2.1',
                                ),
                                array(
                                    'text' => 'Opção 2.2',
                                )
                            ],
                        ),
                    ]])
                ?>
                <h3>Chamada dinâmica</h3>
                <pre>$this->Button->success(['text' => 'Prosseguir...']);</pre>
                <?=   $this->Button->success(['text' => 'Prosseguir...']) ?>
            </div>
        </div>
    </div>
</div>