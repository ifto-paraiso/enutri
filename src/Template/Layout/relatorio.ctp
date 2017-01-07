<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->css('relatorio') ?>
    </head>
    <body>
        <div class="relatorio-wrapper relatorio-wrapper-retrato">
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>