
<?php

$aprovadoLabel = '';
if ($processo->aprovado) {
    $aprovadoLabel = $this->Label->success('Aprovado');
} else {
    $aprovadoLabel = $this->Label->default('Não avaliado');
}

?>

<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('Unidade Executora', h($processo->participante->uex->nome_reduzido)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Exercício', h($processo->participante->exercicio->ano)) ?>
    </div>
    <div class="col-md-4">
        <?= $this->Data->display('Processo', h($processo->nome) . ' ' . $aprovadoLabel) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?= $this->Data->display('Modalidades de Ensino', h($processo->modalidades)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Público', h($processo->publico), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Período', h($processo->periodoText), ['class' => 'number']) ?>
    </div>
    <div class="col-md-4">
        <?= $this->Data->display('Observações do Processo', h($processo->observacoes)) ?>
    </div>
</div>