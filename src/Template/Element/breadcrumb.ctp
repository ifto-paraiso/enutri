<?php

echo $this->Html->getCrumbList(
    array(
        'firstClass' => false,
        'class'      => 'breadcrumb',
        'lastClass'  => 'active',
        'escape'     => false,
    ),
    $this->Icon->make('painel')
);

?>
