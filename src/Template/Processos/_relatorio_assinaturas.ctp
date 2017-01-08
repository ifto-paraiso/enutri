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
