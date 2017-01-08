
<?php

use Cake\Core\Configure;

Configure::load('vdr');

?>

<table class="table table-bordered table-hover data">
    <thead>
        <tr>
            <th rowspan="2">
                Nutriente
            </th>
            <th rowspan="2">
                Valor
            </th>
            <th colspan="<?= count(Configure::read('faixas')) ?>">
                % dos valores diários recomendados por faixa etária
            </th>
        </tr>
        <tr>
            <?php foreach (Configure::read('faixas') as $faixa): ?>
                <th class="col-faixa">
                    <?= h($faixa['titulo']) ?>
                </th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Configure::read('nutrientes') as $nutriente): ?>
            <tr>
                <td>
                    <?= h($nutriente['titulo']) ?>
                </td>
                <td class="number">
                    <strong>
                        <?= $this->Formatter->float($nutrientes[$nutriente['alias']]) ?>
                    </strong>
                    <span class="medida">
                        <?= $nutriente['medida'] ?>
                    </span>
                </td>
                <?php foreach (Configure::read('faixas') as $faixa): ?>
                    <td class="number">
                        <?= $this->Formatter->float($nutrientes[$nutriente['alias']] * 100.0 / $faixa['nutrientes'][$nutriente['alias']]) ?>
                        %
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>