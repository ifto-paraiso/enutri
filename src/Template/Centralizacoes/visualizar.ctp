<?php

$this->extend('_centralizacoes');

$this->assign('content-description', 'Informações da Centralização');

$this->Html->addCrumb('Centralizações', ['action' => 'listar']);
$this->Html->addCrumb(h($centralizacao->nome));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'info',
    'text' => 'Informações da Centralização',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Listar Centralizações',
                        'icon' => 'voltar',
                        'url'  => ['action' => 'listar'],
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'text' => 'Incluir Processo',
                        'icon' => 'inserir',
                        'url'  => [
                            'action' => 'processoIncluir',
                            h($centralizacao->id)
                        ],
                    ),
                    array(
                        'title' => 'Mais opções',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Editar Centralização',
                                    'icon' => 'editar',
                                    'url'  => [
                                        'action' => 'editar',
                                        h($centralizacao->id)
                                    ],
                                ),
                                array(
                                    'text' => 'Excluir Centralização',
                                    'icon' => 'excluir',
                                    'url'  => [
                                        'action' => 'excluir',
                                        h($centralizacao->id)
                                    ],
                                ),
                            ]
                        ]
                    )
                ]
            ),
            array(
                'buttons' => [
                    array(
                        'icon' => 'imprimir',
                        'title' => 'Relatórios',
                        'dropdown' => [
                            'items' => [
                                array(
                                    'text' => 'Resumo da Centralização',
                                    'icon' => 'relatorio',
                                    'target' => '_blank',
                                    'url'  => [
                                        'action' => 'relatorioResumo',
                                        h($centralizacao->id),
                                    ]
                                ),
                                array(
                                    'text' => 'Previsão de Aquisição Centralizada',
                                    'icon' => 'relatorio',
                                    'target' => '_blank',
                                    'url'  => [
                                        'action' => 'relatorioPrevisao',
                                        h($centralizacao->id),
                                    ]
                                ),
                                array(
                                    'text' => 'Mapa de Distribuição de Alimentos',
                                    'icon' => 'relatorio',
                                    'target' => '_blank',
                                    'url'  => [
                                        'action' => 'relatorioMapa',
                                        h($centralizacao->id),
                                    ]
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

echo $this->element('../Centralizacoes/_centralizacao_info', ['centralizacao' => $centralizacao]);

?>

<legend>
    <?= $this->Icon->make('processo') ?>
    Processos
</legend>

<?php if (count($centralizacao->centralizacao_processos) < 1): ?>
    <div class="alert alert-info">
        Nenhum processo.
    </div>
<?php else: ?>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>
                    Unidade Executora
                </th>
                <th>
                    Processo
                </th>
                <th>
                    Modalidades
                </th>
                <th>
                    Público
                </th>
                <th>
                    Período
                </th>
                <th class="options-compact">
                    Opções
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($centralizacao->centralizacao_processos as $cp): ?>
                <tr>
                    <td>
                        <?= h($cp->processo->participante->uex->nome_reduzido) ?>
                    </td>
                    <td>
                        <?= h($cp->processo->nome) ?>
                    </td>
                    <td>
                        <?= h($cp->processo->modalidades) ?>
                    </td>
                    <td class="number">
                        <?= h($cp->processo->publico) ?>
                    </td>
                    <td style="text-align: center;">
                        <?= h($cp->processo->periodoText) ?>
                    </td>
                    <td class="options-compact">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'processoRemover', h($cp->id)],
                                'icon'  => 'excluir',
                                'title' => 'Remover processo',
                                'confirm' => sprintf(
                                    'Deseja remover o processo %s (%s) desta centralização?',
                                    h($cp->processo->nome),
                                    h($cp->processo->participante->uex->nome_reduzido)
                                ),
                            )
                        ])
                    ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= $this->Box->end() ?>
