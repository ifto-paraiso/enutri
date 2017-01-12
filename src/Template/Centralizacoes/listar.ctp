<?php

$this->extend('_centralizacoes');

$this->assign('content-description', 'Relação das centralizações');

$this->Html->addCrumb('Centralizações');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Centralizações',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Nova Centralização',
                        'icon'  => 'cadastrar',
                        'class' => 'btn-primary',
                        'url'   => ['action' => 'cadastrar'],
                    )
                ]
            )
        ]
    ]
]);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th style="width: 80px; text-align: center;">
                Exercício
            </th>
            <th>
                Centralização
            </th>
            <th style="width: 180px; text-align: center;">
                Quantidade de Processos
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($centralizacoes as $c): ?>
            <tr>
                <td style="text-align: center;">
                    <?= h($c->exercicio->ano) ?>
                </td>
                <td>
                    <?=
                        $this->Html->link(h($c->nome),
                            array(
                                'action' => 'visualizar',
                                h($c->id),
                            ),
                            array(
                                'title' => 'Visualizar informações da centralização',
                            )
                        );
                    ?>
                </td>
                <td style="text-align: center">
                    <?= h($c->qtdeProcessos) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($c->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar centralização',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($c->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar centralização',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($c->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir centralização',
                            )
                        ])
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php

echo $this->Box->end();
