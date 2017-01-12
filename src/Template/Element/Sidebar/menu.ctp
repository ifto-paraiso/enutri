<ul class="sidebar-menu">
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-clock-o"></i>
            <span>Planejamento</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('processo') . ' Processos',
                        ['controller' => 'processos'],
                        ['escape' => false]
                    );
                ?>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('centralizacao') . ' Centralizações',
                        ['controller' => 'centralizacoes'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-building"></i>
            <span>Entidade Executora</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('uex') . ' Unidades Executoras',
                        ['controller' => 'uexs'],
                        ['escape' => false]
                    );
                ?>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('exercicio') . ' Exercícios',
                        ['controller' => 'exercicios'],
                        ['escape' => false]
                    );
                ?>
            </li>
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('usuarios') . ' Usuários',
                        ['controller' => 'usuarios'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-apple"></i>
            <span>Base Nutricional</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <?=
                    $this->Html->link(
                        $this->Icon->make('alimento') . ' Alimentos',
                        ['controller' => 'alimentos'],
                        ['escape' => false]
                    );
                ?>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-question-circle"></i>
            <span>Ajuda</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-book"></i>
                    Manual do sistema
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-info-circle"></i>
                    Sobre o Enutri
                </a>
            </li>
        </ul>
    </li>
</ul>