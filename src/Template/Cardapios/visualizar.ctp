<?php

$this->extend('_cardapios');

$this->assign('content-description', 'Informações do Cardápio');

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id),
]);
$this->Html->addCrumb(h($cardapio->processo->participante->uex->nome_reduzido), [
    'action' => 'listar',
    h($cardapio->processo->participante->uex->id)
]);
$this->Html->addCrumb(h($cardapio->processo->nomeFull), [
    'action' => 'visualizar',
    h($cardapio->processo->id)
]);
$this->Html->addCrumb('Cardápio');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações do Cardápio',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Processo',
                        'icon'  => 'voltar',
                        'title' => 'Voltar ao processo',
                        'url'   => [
                            'controller' => 'Processos',
                            'action' => 'visualizar',
                            h($cardapio->processo->id),
                        ],
                    ),
                    array (
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text'  => 'Novo Cardápio',
                                    'icon'  => 'cadastrar',
                                    'url'   => [
                                        'controller' => 'Cardapios',
                                        'action' => 'cadastrar',
                                        h($cardapio->processo->id),
                                    ],
                                )
                            ]
                        ]
                    ),
                ],
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Atendimentos',
                        'icon' => 'atendimento',
                        'title' => 'Editar atendimentos',
                        'url' => [
                            'action' => 'atendimentosEditar',
                            h($cardapio->id),
                        ], 
                    ),
                    array(
                        'text' => 'Ingredientes',
                        'icon' => 'ingrediente',
                        'title' => 'Editar ingredientes',
                        'url' => [
                            'action' => 'ingredientesEditar',
                            h($cardapio->id),
                        ],
                    ),
                    array(
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Editar Cardápio',
                                    'icon' => 'editar',
                                    'url' => [
                                        'action' => 'editar',
                                        h($cardapio->id),
                                    ],
                                ),
                                array(
                                    'text' => 'Excluir Cardápio',
                                    'icon' => 'excluir',
                                    'confirm' => 'Deseja excluir este cardápio?',
                                    'url' => [
                                        'action' => 'excluir',
                                        h($cardapio->id),
                                    ],
                                ),
                            ],
                        ],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->element('../Processos/_processo_info', ['processo' => $cardapio->processo]);

echo $this->element('../Cardapios/_info', ['cardapio' => $cardapio]);

?>

<div class="row">
    <div class="col-md-4">
        <fieldset>
            <legend>
                <?= $this->Icon->make('atendimento') ?>
                Calendário
            </legend>
            
            <?php if ($cardapio->frequencia < 1): ?>
                <div class="alert alert-warning">
                    Nenhuma data.
                </div>
            <?php else: ?>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Data
                            </th>
                            <th class="options-compact">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cardapio->atendimentos as $atendimento): ?>
                            <tr>
                                <td>
                                    <?= h($atendimento->data->i18nFormat('dd/MM/YYYY')) ?>
                                </td>
                                <td class="options-compact">
                                    <?=
                                        $this->Options->make([
                                            array(
                                                'icon' => 'excluir',
                                                'url' => ['action' => 'atendimentoRemover', h($atendimento->id)],
                                                'confirm' => sprintf('Deseja remover o atendimento do dia %s ?', h($atendimento->data->i18nFormat('dd/MM/YYYY'))),
                                            )
                                        ]);
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            
        </fieldset>
    </div>
    
    <div class="col-md-8">
        
        <fieldset>
            <legend>
                <?= $this->Icon->make('ingrediente') ?>
                Ingredientes
            </legend>
        </fieldset>
        
        <?php if (count($cardapio->ingredientes) < 1): ?>
            <div class="alert alert-warning">
                Nenhum ingrediente.
            </div>
        <?php else: ?>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>
                            Nome do Alimento
                        </th>
                        <th style="width: 100px;">
                            Quantidade
                        </th>
                        <th class="options-compact">
                            Opções
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cardapio->ingredientes as $ingrediente): ?>
                        <tr>
                            <td>
                                <?= h($ingrediente->alimento->nome) ?>
                                <?php
                                    if ($ingrediente->observacoes != '') {
                                        echo sprintf('(%s)', h($ingrediente->observacoes));
                                    }
                                ?>
                            </td>
                            <td class="number">
                                <?= h($this->Formatter->float($ingrediente->quantidade)) ?>
                                <span class="medida">
                                    <?= h($ingrediente->alimento->consumo_medida->sigla) ?>
                                </span>
                            </td>
                            <td class="options-compact">
                                <?=
                                    $this->Options->make([
                                        array(
                                            'icon' => 'excluir',
                                            'url' => ['action' => 'ingredienteRemover', h($ingrediente->id)],
                                            'confirm' => sprintf('Deseja remover o ingrediente "%s" ?', h($ingrediente->alimento->nome)),
                                        )
                                    ]);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
    </div>
    
</div>

<fieldset>
    <legend>
        <?= $this->Icon->make('estatistica') ?>
        Informações Nutricionais
    </legend>
    
    <?= $this->element('../Cardapios/_infonutri', ['nutrientes' => $cardapio->nutrientes]) ?>
    
</fieldset>

<?= $this->Box->end() ?>

