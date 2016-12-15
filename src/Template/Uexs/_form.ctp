
<?= $this->Form->create($uex, ['novalidate' => true]) ?>

<div class="row">
    <div class="col-md-7">
        <?= $this->Form->input('nome', ['label' => 'Nome da Unidade Executora', 'autofocus']) ?>
    </div>
    <div class="col-md-5">
        <?= $this->Form->input('nome_reduzido', ['label' => 'Nome Reduzido']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->input('email', ['label' => 'Email']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('telefone1', ['label' => 'Telefone']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('telefone2', ['label' => 'Telefone Alternativo']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->input('endereco', ['label' => 'Endereço']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->input('bairro', ['label' => 'Bairro']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $this->Form->input('municipio', ['label' => 'Município']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Form->input('uf_id', ['options' => $ufs, 'label' => 'UF']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?= $this->Form->end() ?>