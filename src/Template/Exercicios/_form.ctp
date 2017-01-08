
<?= $this->Form->create($exercicio) ?>

<div class="row">
    <div class="col-md-2">
        <?=
            $this->Form->input('ano', [
                'label' => 'Ano',
                'type'  => 'text',
                'autofocus'
            ]);
        ?>
    </div>
    <div class="col-md-5">
        <?=
            $this->Form->input('responsavel_nome', [
                'label' => 'Nome do Responsável',
                'type'  => 'text',
            ]);
        ?>
    </div>
    <div class="col-md-5">
        <?=
            $this->Form->input('responsavel_funcao', [
                'label' => 'Função do Responsável',
                'type'  => 'text',
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