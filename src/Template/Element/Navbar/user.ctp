<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <?= $this->Icon->make('usuario') ?>
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">
            <?= $user['nome'] ?>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <?=
                $this->Html->link(
                    $this->Icon->make('senha') . 'Alterar Senha',
                    array(
                        'controller' => 'Usuarios',
                        'action'     => 'alterar-senha',
                        h($user['id']),
                    ),
                    array(
                        'escape' => false,
                    )
                );
            ?>
        </li>
        <li>
            <?=
                $this->Html->link(
                    $this->Icon->make('logout') . 'Sair do Sistema',
                    array(
                        'controller' => 'Acesso',
                        'action'     => 'logout',
                        h($user['id']),
                    ),
                    array(
                        'escape'  => false,
                        'confirm' => 'Deseja sair do sistema?',
                    )
                );
            ?>
        </li>
    </ul>
</li>