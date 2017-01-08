<div class="row">
    <div class="col-md-3">
        <?= $this->Data->display('Tipo', h($cardapio->cardapio_tipo->nome)) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Data->display('Nome do Cardápio', h($cardapio->nome)) ?>
    </div>
    <div class="col-md-4">
        <?= $this->Data->display('Observações do Cardápio', h($cardapio->observacoes)) ?>
    </div>
</div>