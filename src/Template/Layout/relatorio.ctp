<!DOCTYPE html>
<html>
    <head>
        <title>
            ENUTRI -
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->css('relatorio') ?>
    </head>
    <body>
        <div class="relatorio-wrapper relatorio-wrapper-retrato">
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>