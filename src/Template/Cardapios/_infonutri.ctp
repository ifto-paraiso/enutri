
<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

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
                        <?php
                            if (isset($nutrientes[$nutriente['alias']])) {
                                echo $this->Formatter->float($nutrientes[$nutriente['alias']]);
                            } else {
                                echo $this->Formatter->float(0);
                            }
                        ?>
                    </strong>
                    <span class="medida">
                        <?= $nutriente['medida'] ?>
                    </span>
                </td>
                <?php foreach (Configure::read('faixas') as $faixa): ?>
                    <td class="number">
                        <?php
                            if (isset($nutrientes[$nutriente['alias']])) {
                                echo $this->Formatter->float($nutrientes[$nutriente['alias']] * 100.0 / $faixa['nutrientes'][$nutriente['alias']]);
                            } else {
                                echo $this->Formatter->float(0);
                            }
                        ?>
                        %
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>