<?php

$this->extend('_exercicios');

$this->assign('content-description', 'Lista de Exercícios');

$this->Html->addCrumb('Exercícios');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Exercícios',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Exercício',
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
            <th>
                Ano
            </th>
            <th>
                Responsável
            </th>
            <th>
                Função
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($exercicios as $exercicio): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($exercicio->ano),
                            ['action' => 'visualizar', h($exercicio->id)],
                            ['title' => 'Visualizar as informações do Exercício']
                        );
                    ?>
                </td>
                <td>
                    <?= h($exercicio->responsavel_nome) ?>
                </td>
                <td>
                    <?= h($exercicio->responsavel_funcao) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($exercicio->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Exercício',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($exercicio->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Exercício',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($exercicio->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Exercício',
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

