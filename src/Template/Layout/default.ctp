<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
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
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
  

    <?= $this->element('footer') ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<?= $this->Html->script('../adminlte/plugins/jQuery/jquery-2.2.3.min.js') ?>

<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('../adminlte/bootstrap/js/bootstrap.min.js') ?>

<!-- AdminLTE App -->
<?= $this->Html->script('../adminlte/dist/js/app.min.js') ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
