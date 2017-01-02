
<?= $this->Form->create($processoModalidade, ['novalidate' => true]) ?>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('modalidade_id', [
                'label' => 'Modalidade de Ensino',
                'type'  => 'select',
                'autofocus',
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('publico', [
                'label' => 'Público',
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
