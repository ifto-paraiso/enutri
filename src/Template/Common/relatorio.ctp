<?php

$relatoriosConfig = \Cake\Core\Configure::read('EEx.Relatorios');

$cabecalho = implode('<br />', $relatoriosConfig['cabecalho']);

?>

<table style="width: 100%;">
    <thead style="display: table-header-group;">
        <tr>
            <td colspan="2">
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
            <td colspan="2">
                <?= $this->fetch('content') ?>
            </td>
        </tr>
    </tbody>
    <tfoot style="display: table-footer-group">
        <tr>
            <td style="width: 50%;">
                ENUTRI - Versão
                <?= h(\Cake\Core\Configure::read('Version')) ?>
            </td>
            <td style="text-align: right">
                <?= h(\Cake\Routing\Router::url('/', true)) ?> 
            </td>
        </tr>
    </tfoot>
</table>
