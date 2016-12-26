<?php

$this->extend('_alimentos');

$this->assign('content-description', 'Lista de alimentos');

$this->Html->addCrumb('Alimentos');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Alimentos',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Alimento',
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
                Nome do Alimento
            </th>
            <th style="width: 80px;">
                Kcal
            </th>
            <th style="width: 80px;">
                CHO (mg)
            </th>
            <th style="width: 80px;">
                PTN (mg)
            </th>
            <th style="width: 80px;">
                LIP (mg)
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alimentos as $alimento): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($alimento->nome),
                            ['action' => 'visualizar', h($alimento->id)],
                            ['title' => 'Visualizar as informações do alimento']
                        );
                    ?>
                </td>
                <td class="number">
                    <?= $this->Number->br(h($alimento->kcal)) ?>
                </td>
                <td class="number">
                    <?= $this->Number->br(h($alimento->cho)) ?>
                </td>
                <td class="number">
                    <?= $this->Number->br(h($alimento->ptn)) ?>
                </td>
                <td class="number">
                    <?= $this->Number->br(h($alimento->lip)) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($alimento->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Alimento',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($alimento->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Alimento',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($alimento->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Alimento',
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

