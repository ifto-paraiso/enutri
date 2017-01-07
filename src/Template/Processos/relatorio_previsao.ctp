<?php

$this->extend('_relatorio');

$this->assign('titulo', 'Previsão de Aquisição de Alimentos');

?>

<table class="data">
    <thead style="display: table-header-group;">
        <tr>
            <th colspan="8">
                Alimentos Previstos
            </th>
        </tr>
        <tr>
            <th style="width: 20px;">
                #
            </th>
            <th>
                Nome do Alimento
            </th>
            <th style="width: 60px;">
                Per capita
            </th>
            <th style="width: 65px;">
                Frequencia
            </th>
            <th style="width: 70px;">
                Per capita geral
            </th>
            <th style="width: 70px;">
                Total
            </th>
            <th style="width: 70px;">
                Preço Unitário
            </th>
            <th style="width: 70px;">
                Preço Total
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($processo->previsao as $alimento): ?>
        <tr>
            <td style="text-align: center;">
                
            </td>
            <td>
                <?= h($alimento['nome']) ?>
            </td>
            <td class="number" style="text-align: center;">
                <?= h(implode('/', array_keys($alimento['percapitas']))) ?>
            </td>
            <td class="number" style="text-align: center;">
                <?= h(implode('/', $alimento['percapitas'])) ?>
            </td>
            <td class="number">
                <?= h($this->Formatter->float($alimento['percapitaGeral'])) ?>
                <span class="medida">
                    <?= h($alimento['consumoMedida']) ?>
                </span>
            </td>
            <td class="number">
                <?= h($this->Formatter->float($alimento['total'], ['places' => 3])) ?>
                <span class="medida">
                    <?= h($alimento['compraMedida']) ?>
                </span>
            </td>
            <td class="number">
                
            </td>
            <td class="number">
                
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="6">
                Totais
            </th>
            <th>
              
            </th>
            <th>
               
            </th>
        </tr>
    </tbody>
</table>
