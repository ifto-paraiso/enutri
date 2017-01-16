<?php

$this->extend('_processos');

$this->assign('content-description', 'Seleção da Unidade Executora');

$this->Html->addCrumb('Processos');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'form',
    'text' => 'Selecione a Unidade Executora',
]);

echo $this->Box->body();

echo $this->Form->create();

?>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('uex_id', [
                'label'   => 'Unidade Executora',
                'options' => $uexs,
                'autofocus',
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?=
            $this->Form->salvar([
                'icon' => 'prosseguir',
                'text' => 'Listar Processos...',
            ]);
        ?>
    </div>
</div>
    
<?php

echo $this->Form->end();

echo $this->Box->end();
