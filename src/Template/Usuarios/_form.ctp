
<?= $this->Form->create($usuario) ?>

<div class="row">
    <div class="col-md-5">
        <?= $this->Form->input('grupo_id', ['autofocus']) ?>
    </div>
    <div class="col-md-7">
        <?= $this->Form->input('nome') ?>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <?= $this->Form->input('email') ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('crn') ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <?= $this->Form->input('endereco') ?>
    </div>
    <div class="col-md-4">
        <?= $this->Form->input('bairro') ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $this->Form->input('municipio') ?>
    </div>
    <div class="col-md-2">
        <?= $this->Form->input('uf_id', ['options' => $ufs]) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('telefone1', ['label' => 'Telefone']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('telefone2', ['label' => 'Celular']) ?>
    </div>
</div>


<?php if($this->request->params['action'] === 'cadastrar'): ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->Form->input('senha', ['label' => 'Senha', 'type' => 'password']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input('senha2', ['label' => 'Repetir Senha', 'type' => 'password']) ?>
    </div>
</div>

<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->salvar() ?>
    </div>
</div>

<?= $this->Form->end() ?>