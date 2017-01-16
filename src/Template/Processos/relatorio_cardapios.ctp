<?php

$this->extend('_relatorio');

$this->assign('titulo', 'Relação de Cardápios');

?>

<?php foreach($processo->cardapios as $count => $cardapio): ?>

    <div style="page-break-inside: avoid;">
        <h2>
            <?= h(sprintf('%d. (%s) %s', $count+1, $cardapio->cardapio_tipo->nome, $cardapio->nome)) ?>
        </h2>
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 110px; vertical-align: text-top;">
                        <table class="data">
                            <thead>
                                <tr>
                                    <th>
                                        Data
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cardapio->atendimentos as $atendimento): ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <?= $this->Formatter->dateWeek($atendimento->data) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        Frequência:
                                        <?= h($cardapio->frequencia) ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                    <td style="vertical-align: text-top;">
                        <table class="data">
                            <thead>
                                <tr>
                                    <th>
                                        Nome do Alimento
                                    </th>
                                    <th style="width: 65px;">
                                        Per capita
                                    </th>
                                    <th style="width: 55px;">
                                        VE (kcal)
                                    </th>
                                    <th style="width: 55px;">
                                        CHO (g)
                                    </th>
                                    <th style="width: 55px;">
                                        PTN (g)
                                    </th>
                                    <th style="width: 55px;">
                                        LIP (g)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cardapio->ingredientes as $ingrediente): ?>
                                    <tr>
                                        <td>
                                            <?= h($ingrediente->nomeFull) ?>
                                        </td>
                                        <td class="number">
                                            <?= h($this->Formatter->float($ingrediente->quantidade)) ?>
                                            <span class="medida">
                                                <?= h($ingrediente->alimento->consumo_medida->sigla) ?>
                                            </span>
                                        </td>
                                        <td class="number">
                                            <?= h($this->Formatter->float($ingrediente->getNutriente('kcal'))) ?>
                                        </td>
                                        <td class="number">
                                            <?= h($this->Formatter->float($ingrediente->getNutriente('cho'))) ?>
                                        </td>
                                        <td class="number">
                                            <?= h($this->Formatter->float($ingrediente->getNutriente('ptn'))) ?>
                                        </td>
                                        <td class="number">
                                            <?= h($this->Formatter->float($ingrediente->getNutriente('lip'))) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">
                                        Totais
                                    </th>
                                    <th class="number">
                                        <?= h($this->Formatter->float($cardapio->getTotalNutriente('kcal'))) ?>
                                    </th>
                                    <th class="number">
                                        <?= h($this->Formatter->float($cardapio->getTotalNutriente('cho'))) ?>
                                    </th>
                                    <th class="number">
                                        <?= h($this->Formatter->float($cardapio->getTotalNutriente('ptn'))) ?>
                                    </th>
                                    <th class="number">
                                        <?= h($this->Formatter->float($cardapio->getTotalNutriente('lip'))) ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

<?php endforeach; ?>

<strong>Legenda:</strong>
<strong>VE:</strong> Valor Energético;
<strong>CHO:</strong> Carboidrato;
<strong>PTN:</strong> Proteína;
<strong>LIP:</strong> Lipídeo.
