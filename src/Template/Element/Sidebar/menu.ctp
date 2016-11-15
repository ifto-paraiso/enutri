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
                <a href="#">
                    <i class="fa fa-fw fa-folder"></i>
                    Processos
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-sitemap fa-rotate-180"></i>
                    Centralizações
                </a>
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
                <a href="#">
                    <i class="fa fa-fw fa-home"></i>
                    Unidades Executoras
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-circle-o-notch"></i>
                    Exercícios
                </a>
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
                <a href="#">
                    <i class="fa fa-fw fa-heartbeat"></i>
                    Nutrientes
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-apple"></i>
                    Alimentos
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-percent"></i>
                    Referências
                </a>
            </li>
            <li>
                <a href="#">
                    <?= $this->Icon->make('preparacao') ?>
                    Preparações
                </a>
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