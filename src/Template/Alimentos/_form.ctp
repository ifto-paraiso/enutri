<?php

$nf = Cake\Core\Configure::read('numberFormat');

echo $this->Form->create($alimento, ['novalidate' => true]);

?>

<div class="row">
    <div class="col-md-6">
        <?=
            $this->Form->input('nome', [
                'label' => 'Nome do Alimento',
                'autofocus'
            ]);
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Form->input('consumo_medida_id', [
                'label'   => 'Unid. Cons.',
                'type'    => 'select',
                'options' => $medidas,
                'title'   => 'Unidade de consumo',
            ]);
        ?>
    </div>
    <div class="col-md-2">
        <?=
            $this->Form->input('compra_medida_id', [
                'label'   => 'Unid. Compra',
                'type'    => 'select',
                'options' => $medidas,
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('fator', [
                'label' => 'Fator',
                'type'  => 'text',
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2 number">
        <?=
            $this->Form->input('kcal', [
                'label' => 'V. En. (kcal)',
                'type'  => 'text',
                'title' => 'Valor energético',
                'value'  => $this->Number->format(h($alimento->kcal), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('cho', [
                'label' => 'Carbo. (g)',
                'type'  => 'text',
                'title' => 'Carboidrato',
                'value'  => $this->Number->format(h($alimento->cho), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('ptn', [
                'label' => 'Proteína (g)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->ptn), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('lip', [
                'label' => 'Lipídeo (g)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->lip), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('ca', [
                'label' => 'Cálcio (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->ca), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('fe', [
                'label' => 'Ferro (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->fe), $nf),
            ]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-2 number">
        <?=
            $this->Form->input('mg', [
                'label' => 'Magnésio (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->mg), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('zn', [
                'label' => 'Zinco (mg)',
                'type'  => 'text',
                'value'  => $this->Number->format(h($alimento->zn), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('vita', [
                'label'  => 'Vit. A (&micro;g)',
                'type'   => 'text',
                'title'  => 'Vitamina A',
                'escape' => false,
                'value'  => $this->Number->format(h($alimento->vita), $nf),
            ]);
        ?>
    </div>
    <div class="col-md-2 number">
        <?=
            $this->Form->input('vitc', [
                'label'  => 'Vit. C (mg)',
                'type'   => 'text',
                'title'  => 'Vitamina C',
                'value'  => $this->Number->format(h($alimento->vitc), $nf),
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