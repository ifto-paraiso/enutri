
<?php

$this->extend('/Common/relatorio');

?>

<table style="width: 100%;">
    <thead style="display: table-header-group;">
        <tr>
            <td>
                <table class="data">
                    <tbody>
                        <tr>
                            <th colspan="3">
                                Informações do Processo
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 75%" colspan="2">
                                <strong>
                                    Unidade Executora:
                                </strong>
                                <?= h($processo->participante->uex->nome) ?>
                            </td>
                            <td>
                                <strong>
                                    Exercício:
                                </strong>
                                <?= h($processo->participante->exercicio->ano) ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%">
                                <strong>
                                    Processo:
                                </strong>
                                <?= h($processo->nome) ?>
                            </td>
                            <td style="width: 25%">
                                <strong>
                                    Público:
                                </strong>
                                <?= h($processo->publico) ?>
                            </td>
                            <td style="width: 25%">
                                <strong>
                                    Período:
                                </strong>
                                <?= h($processo->periodoText) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <strong>
                                    Observações:
                                </strong>
                                <?= h($processo->observacoes) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>               
                <br />
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= $this->fetch('content') ?>
            </td>
        </tr>
    </tbody>
    <tfoot style="display: table-footer-group;">
        <tr>
            <td>
                <?= $this->element('../Processos/_relatorio_assinaturas', ['processo' => $processo]) ?>
            </td>
        </tr>
    </tfoot>
</table>

