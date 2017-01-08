
<?= $this->Form->create($processoModalidade, ['novalidate' => true]) ?>

<div class="row">
    <div class="col-md-6">
        <?php
            if ($this->request->params['action'] === 'modalidadeInserir') {
                echo $this->Form->input('modalidade_id', [
                    'label' => 'Modalidade de Ensino',
                    'type'  => 'select',
                    'autofocus',
                ]);
            } else {
                echo $this->Data->display(
                    'Modalidades de Ensino',
                    h($processoModalidade->modalidade->nome)
                );
            }
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('publico', [
                'label' => 'Público',
                'type'  => 'text',
                'autofocus',
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
