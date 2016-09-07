<?php

$this->extend('_ui');
$this->assign('content-description', 'Guia geral');

?>

<div class="row">
    <div class="col-lg-4 col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Helpers
                </h3>
            </div>
            <div class="box-body">
                <ul>
                    <li>
                        <?= $this->Html->link('Icon', ['action' => 'icon']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('Button', ['action' => 'button']) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>