
<?= $this->Form->create($participante) ?>

<div class="row">
    <div class="col-md-6">
        <?php
            if ($this->request->params['action'] === 'participanteInserir') {
                echo $this->Form->input('uex_id', [
                    'type'    => 'select',
                    'label'   => 'Unidade Executora',
                    'options' => $uexs,
                    'autofocus',
                ]);
            } else {
                echo $this->Data->display(
                    'Função do Responsável',
                    h($participante->uex->nome_reduzido)
                );
            }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('responsavel_nome', [
                'label'   => 'Nome do Responsável',
                'autofocus',
            ]);
        ?>
    </div>
    <div class="col-md-6">
        <?=
            $this->Form->input('responsavel_funcao', [
                'label'   => 'Função do Responsável',
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