
<?= $this->Form->create($centralizacao) ?>

<div class="row">
    <div class="col-md-2">
        <?=
            $this->Form->input('exercicio_id', [
                'type'  => 'select',
                'label' => 'Exercício',
                'autofocus'
            ]);
        ?>
    </div>
    <div class="col-md-6">
        <?=
            $this->Form->input('nome', [
                'type'  => 'text',
                'label' => 'Nome da Centralização',
                'autofocus'
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