
<?= $this->Form->create($cardapio, ['novalidate' => true]) ?>

<div class="row">
    <div class="col-md-3">
        <?=
            $this->Form->input('cardapio_tipo_id', [
                'label' => 'Tipo do Cardápio',
                'type'  => 'select',
                'autofocus',
            ]);
        ?>
    </div>
    <div class="col-md-5">
        <?=
            $this->Form->input('nome', [
                'label' => 'Nome do Cardápio',
            ]);
        ?>
    </div>
    <div class="col-md-4">
        <?=
            $this->Form->input('observacoes', [
                'label' => 'Observações do Cardápio',
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?= $this->Form->end() ?>
