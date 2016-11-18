<?php

$this->extend('_usuarios');

$this->assign('content-description', 'Lista de usuários');

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Usuários',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Usuário',
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
                Nome do Usuário
            </th>
            <th>
                Grupo
            </th>
            <th class="options">
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td>
                    <?=
                        $this->Html->link(
                            h($usuario->nome),
                            ['action' => 'visualizar', h($usuario->id)],
                            ['title' => 'Visualizar as informações do usuário']
                        );
                    ?>
                </td>
                <td>
                    <?= h($usuario->grupo->nome) ?>
                </td>
                <td class="options">
                    <?=
                        $this->Options->make([
                            array(
                                'url'   => ['action' => 'visualizar', h($usuario->id)],
                                'icon'  => 'visualizar',
                                'title' => 'Visualizar Usuário',
                            ),
                            array(
                                'url'   => ['action' => 'editar', h($usuario->id)],
                                'icon'  => 'editar',
                                'title' => 'Editar Usuário',
                            ),
                            array(
                                'url'   => ['action' => 'excluir', h($usuario->id)],
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

