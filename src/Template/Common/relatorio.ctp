<?php

\Cake\Core\Configure::load('eex');

$relatoriosConfig = \Cake\Core\Configure::read('Relatorios');

$cabecalho = implode('<br />', $relatoriosConfig['cabecalho']);

?>

<table style="width: 100%;">
    <thead style="display: table-header-group;">
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td class="header-logo-wrapper">
                                <?= $this->Html->image('logo', ['class' => 'header-logo']) ?>
                            </td>
                            <td>
                                <?= $cabecalho ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h1 class="header-titulo">
                    <?= $this->fetch('titulo') ?>
                </h1>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= $this->fetch('content') ?>
            </td>
        </tr>
    </tbody>
</table>
