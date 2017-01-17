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

?>

<br />

<div style="text-align: right;">
    <?= h($processo->participante->uex->municipio) ?>
    -
    <?= h($processo->participante->uex->uf->sigla) ?>,
    <?= h($this->Formatter->dateFull(\Cake\I18n\Time::now())) ?>.
</div>

<br />

<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 50%; text-align: center; vertical-align: text-top;">
                _________________________________
                <br />
                <?= h($processo->aprovador_usuario->nome) ?>
                <br />
                Responsável Técnico
                <br /> 
                CRN: 
                <?= h($processo->aprovador_usuario->crn) ?>
            </td>
            <td style="width: 50%; text-align: center; vertical-align: text-top;">
                _________________________________
                <br />
                <?= h($processo->participante->responsavel_nome) ?>
                <br />
                <?= h($processo->participante->responsavel_funcao) ?>
            </td>
        </tr>
    </tbody>
</table>
