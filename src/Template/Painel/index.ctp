<?php

$this->extend('_painel');

$this->assign('content-icon', "painel");
$this->assign('content-title', "Bem vindo(a), {$user['nome']}");

?>

<div class="row">
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'planejamento',
                'text' => 'Planejamento',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'processo',
                'text' => 'Processos',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'processos',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'centralizacao',
                'text' => 'Centralizações',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'centralizacoes',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'eex',
                'text' => 'Entidade Executora',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'uex',
                'text' => 'Unidades Executoras',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'uexs',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'exercicio',
                'text' => 'Exercícios',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'exercicios',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'usuarios',
                'text' => 'Usuários',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'usuarios',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'alimento',
                'text' => 'Base Nutricional',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'alimento',
                'text' => 'Alimentos',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'alimentos',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $this->Box->create();
            echo $this->Box->header([
                'icon' => 'ajuda',
                'text' => 'Ajuda',
            ]);
            echo $this->Box->body();
            echo $this->Button->make([
                'icon' => 'manual',
                'text' => 'Manual do Sistema',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'ajuda',
                    'action'     => 'manual',
                ]
            ]);
            echo $this->Button->make([
                'icon' => 'sobre',
                'text' => 'Sobre o Enutri',
                'class' => 'btn-default btn-block',
                'url' => [
                    'controller' => 'ajuda',
                    'action'     => 'sobre',
                ]
            ]);
            echo $this->Box->end();
        ?>
    </div>
</div>