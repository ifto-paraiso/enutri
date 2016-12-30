<?php

$this->extend('_processos');

$this->assign('content-description', 'Lista de Processos');

$this->Html->addCrumb('Processos', ['action' => 'selecionarUex']);
$this->Html->addCrumb(h($uex->nome_reduzido));

echo $this->Box->create();

echo $this->Box->header([
    'icon' => 'lista',
    'text' => 'Relação de Processos',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text'  => 'Selecionar UEx',
                        'icon'  => 'voltar',
                        'url'   => ['action' => 'selecionarUex'],
                    ),
                ],
            ),
            array(
                'buttons' => [
                    array(
                        'text'  => 'Cadastrar Processo',
                        'icon'  => 'cadastrar',
                        'class' => 'btn-primary',
                        'url'   => ['action' => 'cadastrar'],
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

?>

<div class="row">
    <div class="col-md-6">
        <?= $this->Data->display('Unidade Executora', h($uex->nome_reduzido)) ?>
    </div>
</div>

<?php if (count($processos->toArray()) < 1): ?>
    <div class="alert alert-info">
        Esta Unidade Executora não possui nenhum processo cadastrado.
    </div>
<?php endif; ?>

<?= $this->Box->bodyEnd(); ?>

<?php if (count($processos->toArray()) > 0): ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="text-align: center; width: 100px;">
                    Exercício
                </th>
                <th>
                    Processo
                </th>
                <th>
                    Modalidades
                </th>
                <th style="text-align: right; width: 80px;">
                    Período
                </th>
                <th style="text-align: right; width: 80px;">
                    Público
                </th>
                <th class="options">
                    Opções
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($processos as $processo): ?>
                <tr>
                    <td style="text-align: center;">
                        <?= h($processo->participante->exercicio->ano) ?>
                    </td>
                    <td>
                        <?=
                            $this->Html->link(
                                h($processo->nome),
                                ['action' => 'visualizar', h($processo->id)],
                                ['title' => 'Visualizar as informações deste processo']
                            )
                        ?>
                    </td>
                    <td>
                        <?= h($processo->modalidades) ?>
                    </td>
                    <td class="number">
                        <?= h($processo->periodoText)  ?>
                    </td>
                    <td class="number">
                        <?= h($processo->publico)  ?>
                    </td>
                    <td class="options">
                        <?=
                            $this->Options->make([
                                array(
                                    'url'   => ['action' => 'visualizar', h($processo->id)],
                                    'icon'  => 'visualizar',
                                    'title' => 'Visualizar Processo',
                                ),
                                array(
                                    'url'   => ['action' => 'editar', h($processo->id)],
                                    'icon'  => 'editar',
                                    'title' => 'Editar Processo',
                                ),
                                array(
                                    'url'   => ['action' => 'excluir', h($processo->id)],
                                    'icon'  => 'excluir',
                                    'title' => 'Excluir Processo',
                                )
                            ])
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php

echo $this->Box->end();

