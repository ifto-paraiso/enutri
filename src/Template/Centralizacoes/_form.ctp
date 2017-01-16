
<?= $this->Form->create($centralizacao) ?>

<div class="row">
    <div class="col-md-2">
        <?php
            if ($this->request->params['action'] === 'cadastrar') {
            echo $this->Form->input('exercicio_id', [
                'type'  => 'select',
                'label' => 'Exercício',
                'autofocus'
            ]);
            } else {
                echo $this->Data->display('Exercício', h($centralizacao->exercicio->ano));
            }
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
    <div class="col-md-2">
        
    </div>
    <div class="col-md-10">
        <?=
            $this->Form->input('observacoes', [
                'type'  => 'text',
                'label' => 'Observações',
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