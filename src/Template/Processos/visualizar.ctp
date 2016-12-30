<?php

$this->extend('_processos');

$this->assign('content-description', 'Informações do Processo');

$this->Html->addCrumb( 'Processos', [
    'action' => 'listar',
    h($processo->participante->uex->id),
]);
$this->Html->addCrumb(h($processo->participante->uex->nome_reduzido), [
    'action' => 'listar',
    h($processo->participante->uex->id)
]);
$this->Html->addCrumb(h($processo->nomeFull));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações do Processo',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Todos os Processos',
                        'icon'  => 'voltar',
                        'url'   => [
                            'action' => 'listar',
                            h($processo->participante->uex->id),
                        ],
                    ),
                ],
            ),
            array(
                'buttons' => [
                    array(
                        'text'  => 'Novo Cardápio',
                        'icon'  => 'cadastrar',
                        'url'   => [
                            'controller' => 'Cardapios',
                            'action' => 'cadastrar'
                        ],
                    ),
                    array(
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Adicionar Modalidade',
                                    'icon' => 'inserir',
                                    'url' => [
                                        'action' => 'modalidadeInserir',
                                        h($processo->id),
                                    ],
                                ),
                                array(
                                    'type' => 'separator',
                                ),
                                array(
                                    'text' => 'Editar Processo',
                                    'icon' => 'editar',
                                    'url' => [
                                        'action' => 'editar',
                                        h($processo->id),
                                    ],
                                ),
                                array(
                                    'text' => 'Excluir Processo',
                                    'icon' => 'excluir',
                                    'url' => [
                                        'action' => 'excluir',
                                        h($processo->id),
                                    ],
                                ),
                            ],
                        ],
                    ),
                ],
            ),
            array(
                'buttons' => [
                    array(
                        'icon' => 'imprimir',
                        'title' => 'Relatórios',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Resumo do Processo',
                                    'icon' => 'relatorio',
                                    'url'  => [
                                        'action' => 'relatorioResumo',
                                        h($processo->id),
                                    ]
                                ),
                                array(
                                    'text' => 'Cardápios',
                                    'icon' => 'relatorio',
                                    'url'  => [
                                        'action' => 'relatorioCardapios',
                                        h($processo->id),
                                    ]
                                ),
                                array(
                                    'text' => 'Previsão de Aquisição',
                                    'icon' => 'relatorio',
                                    'url'  => [
                                        'action' => 'relatorioPrevisao',
                                        h($processo->id),
                                    ]
                                ),
                                array(
                                    'text' => 'Calendário do Lanche',
                                    'icon' => 'relatorio',
                                    'url'  => [
                                        'action' => 'relatorioCalendario',
                                        h($processo->id),
                                    ]
                                ),
                            ]
                        ]
                    )
                ]
            )
        ],
    ],
]);

echo $this->Box->body();

require_once '_processo_info.ctp';

?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>
                Modalidades de Ensino
            </th>
            <th style="width: 80px; text-align: right;">
                Público
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($processo->processo_modalidades as $processoModalidade): ?>
            <tr>
                <td>
                    <?= h($processoModalidade->modalidade->nome) ?>
                </td>
                <td class="number">
                    <?= h($processoModalidade->publico) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => [
                                    'action' => 'modalidadeEditar',
                                    h($processoModalidade->id)
                                ],
                                'icon'  => 'editar',
                                'title' => 'Editar Modalidade do Processo',
                            ),
                            array(
                                'url'   => [
                                    'action' => 'modalidadeExcluir',
                                    h($processoModalidade->id)
                                ],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Modalidade do Processo',
                            )
                        ]);
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>
                Público Total do Processo
            </th>
            <th class="number">
                <?= h($processo->publico) ?>
            </th>
            <th>
                
            </th>
        </tr>
    </tfoot>
</table>

<br />

<fieldset>
    <legend>
        <?= $this->Icon->make('cardapio') ?>
        Cardápios do Processo
    </legend>
    
    <?php if (count($processo->cardapios) < 1): ?>
    
        <div class="alert alert-info">
            Nenhum cardápio neste processo.
        </div>
    
    <?php else: ?>
    
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center; width: 160px;">
                        Tipo do Cardápio
                    </th>
                    <th>
                        Nome do Cardápio
                    </th>
                    <th style="text-align: center; width: 140px;">
                        Frequência
                    </th>
                    <th class="options">
                        Opções
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($processo->cardapios as $cardapio): ?>
                    <tr>
                        <td style="text-align: center;">
                            <?= h($cardapio->cardapio_tipo->nome) ?>
                        </td>
                        <td>
                            <?=
                                $this->Html->link(
                                    h($cardapio->nome),
                                    array(
                                        'controller' => 'Cardapios',
                                        'action' => 'visualizar',
                                        h($cardapio->id),
                                    ),
                                    array(
                                        'title' => 'Visualizar as informações do cardápio'
                                    )
                                );
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php printf('%1d', $cardapio->frequencia) ?>
                            <?= $cardapio->frequencia == 1 ? 'vez' : 'vezes' ?>
                        </td>
                        <td class="options">
                            <?=
                                $this->Options->make([
                                    array(
                                        'url'   => [
                                            'controller' => 'Cardapios',
                                            'action' => 'editar',
                                            h($cardapio->id)
                                        ],
                                        'icon'  => 'editar',
                                        'title' => 'Editar Cardápio',
                                    ),
                                    array(
                                        'url'   => [
                                            'controller' => 'Cardapios',
                                            'action' => 'excluir',
                                            h($cardapio->id)
                                        ],
                                        'icon'  => 'excluir',
                                        'title' => 'Excluir Processo',
                                        'confirm' => sprintf('Deseja excluir o cardápio %s?', h($cardapio->nome))
                                    ),
                                    array(
                                        'url'   => [
                                            'controller' => 'Cardapios',
                                            'action' => 'ingredientesEditar',
                                            h($cardapio->id)
                                        ],
                                        'icon'  => 'ingrediente',
                                        'title' => 'Editar Ingredientes',
                                    ),
                                    array(
                                        'url'   => [
                                            'controller' => 'Cardapios',
                                            'action' => 'atendimentosEditar',
                                            h($cardapio->id)
                                        ],
                                        'icon'  => 'atendimento',
                                        'title' => 'Editar Atendimentos',
                                    ),
                                ]);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    <?php endif; ?>
    
</fieldset>

<?= $this->Box->end() ?>

