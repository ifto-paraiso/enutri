<?php

$this->extend('_relatorio');

$this->assign('titulo', 'Calendário de Cardápios');

?>

<table  style="width: 100%;">
    <thead class="data-container-header">
        <tr>
            <th style="width: 120px;">
                Data
            </th>
            <th>
                Cardápios
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processo->calendario as $data): ?>
            <tr  style="page-break-inside: avoid;">
                <td style="vertical-align: text-top;">
                    <table class="data" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th>
                                    <?= h($this->Formatter->dateWeek($data['data'])) ?>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </td>
                <td>
                    <table class="data" style="margin-top: 10px;">
                        <tbody>
                            <?php foreach ($data['cardapios'] as $cardapio): ?>
                                <tr>
                                    <td style="width: 120px; text-align: center;">
                                        <?= h($cardapio['tipo']) ?>
                                    </td>
                                    <td>
                                        <?= h($cardapio['nome']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
