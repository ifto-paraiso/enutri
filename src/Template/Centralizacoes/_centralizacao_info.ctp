
<div class="row">
    <div class="col-md-2">
        <?= $this->Data->display('Exercício', h($centralizacao->exercicio->ano)) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Data->display('Nome da Centralização', h($centralizacao->nome)) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Data->display('Público Total', h($centralizacao->publico), ['class' => 'number']) ?>
    </div>
    <div class="col-md-2 number">
        <?= $this->Data->display('Período Total', h($centralizacao->periodoFull), ['class' => 'number']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <?= $this->Data->display('Processos', h($centralizacao->qtdeProcessos), ['title' => 'Quantidade de processos', 'class' => 'number']) ?>
    </div>
    <div class="col-md-10">
        <?= $this->Data->display('Observações', h($centralizacao->observacoes)) ?>
    </div>
</div>
