<?php

$this->extend('_uexs');

$this->assign('content-description', 'Lista de Unidades Executoras');

$this->Html->addCrumb('UExs');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Unidades Executoras',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar UEx',
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
                Nome da UEx
            </th>
            <th>
                Bairro
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($uexs as $uex): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($uex->nome),
                            ['action' => 'visualizar', h($uex->id)],
                            ['title' => 'Visualizar as informações do usuário']
                        );
                    ?>
                </td>
                <td>
                    <?= h($uex->bairro) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($uex->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Usuário',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($uex->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Usuário',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($uex->id)],
                                'icon'  => 'excluir',
                                'title' => 'Excluir Usuário',
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

