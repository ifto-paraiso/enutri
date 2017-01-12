<?php

$this->extend('_relatorio');

$this->assign('titulo', 'Previsão de Aquisição de Alimentos Centralizada');

?>


<table class="data">
    <thead style="display: table-header-group;">
        <tr>
            <th colspan="5">
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
        <?php $count = 1; ?>
        <?php foreach($centralizacao->previsao as $alimento): ?>
        <tr>
            <td style="text-align: center;">
                <?= h($count++) ?>
            </td>
            <td>
                <?= h($alimento['nome']) ?>
            </td>
            <td class="number">
                <?= h($this->Formatter->float($alimento['total'], ['places' => 3, 'precision' => 3])) ?>
                <span class="medida">
                    <?= h($alimento['medida']) ?>
                </span>
            </td>
            <td class="number">
                
            </td>
            <td class="number">
                
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3">
                Totais
            </th>
            <th>
              
            </th>
            <th>
               
            </th>
        </tr>
    </tbody>
</table>
