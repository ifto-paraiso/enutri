
<?php

$endereco = \Cake\Core\Configure::read('EEx.Endereco');

?>

<br />

<div style="text-align: right;">
    <?= h($endereco['municipio']) ?>
    -
    <?= h($endereco['uf']) ?>,
    <?= h($this->Formatter->dateFull(\Cake\I18n\Time::now())) ?>.
</div>

<br />

<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 50%; text-align: center; vertical-align: text-top;">
                _________________________________
                <br />
                Responsável Técnico
            </td>
            <td style="width: 50%; text-align: center; vertical-align: text-top;">
                _________________________________
                <br />
                <?= h($centralizacao->exercicio->responsavel_nome) ?>
                <br />
                <?= h($centralizacao->exercicio->responsavel_funcao) ?>
            </td>
        </tr>
    </tbody>
</table>
