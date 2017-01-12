
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
                            <th colspan="4">
                                Informações da Centralização
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                <strong>
                                    Exercício:
                                </strong>
                                <?= h($centralizacao->exercicio->ano) ?>
                            </td>
                            <td style="width: 40%;">
                                <strong>
                                    Centralização:
                                </strong>
                                <?= h($centralizacao->nome) ?>
                            </td>
                            <td style="width: 20%;">
                                <strong>
                                    Público Total:
                                </strong>
                                <?= h($centralizacao->publico) ?>
                            </td>
                            <td style="width: 20%;">
                                <strong>
                                    Período Total:
                                </strong>
                                <?= h($centralizacao->periodo) ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                <strong>
                                    Nº de Processos:
                                </strong>
                                <?= h($centralizacao->qtdeProcessos) ?>
                            </td>
                            <td colspan="3">
                                <strong>
                                    Observações:
                                </strong>
                                <?= h($centralizacao->observacoes) ?>
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
                <?= $this->element('../Centralizacoes/_relatorio_assinaturas', ['centralizacao' => $centralizacao]) ?>
            </td>
        </tr>
    </tfoot>
</table>

