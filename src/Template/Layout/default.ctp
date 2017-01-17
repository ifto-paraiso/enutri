<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        ENUTRI - 
        <?= $this->fetch('title') ?>
    </title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.6 -->
    <?= $this->Html->css('../adminlte/bootstrap/css/bootstrap.min.css') ?>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Theme style -->
    <?= $this->Html->css('../adminlte/dist/css/AdminLTE.min.css') ?>
    
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <?= $this->Html->css('../adminlte/dist/css/skins/skin-red-light.min.css') ?>

    <?= $this->Html->css('enutri') ?>
    
    <!-- jQuery 2.2.3 -->
    <?= $this->Html->script('../adminlte/plugins/jQuery/jquery-2.2.3.min.js') ?>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse skin-red-light">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <?=
            $this->Html->link(
                $this->Html->tag('span', '<b>E</b>nutri', ['class' => 'logo-lg']).
                 $this->Html->tag('span', '<b>E</b>', ['class' => 'logo-mini']),
                '/',
                ['class' => 'logo', 'escape' => false]
            );
        ?>

        <!-- Header Navbar -->
        <?= $this->element('navbar') ?>
  
    </header>
    
    <?= $this->element('sidebar') ?>
  
  
    <div class="content-wrapper">
        
        <section class="container-fluid">
            <div class="flash-wrapper">
                <div class="flash-float">
                    <?= $this->Flash->render() ?>
                </div>
            </div>
        </section>
        
        
        <?= $this->fetch('content') ?>
    </div>
  

    <?= $this->element('footer') ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('../adminlte/bootstrap/js/bootstrap.min.js') ?>

<!-- AdminLTE App -->
<?= $this->Html->script('../adminlte/dist/js/app.min.js') ?>

<?= $this->Html->script('enutri') ?>

</body>
</html>
