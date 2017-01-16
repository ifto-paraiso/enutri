
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Versão <?= \Cake\Core\Configure::read('Version') ?>
    </div>
    <!-- Default to the left -->
    <strong>
        <?= $this->Html->link('ENUTRI', ['controller' => 'ajuda', 'action' => 'sobre']) ?>
    </strong>::
    <?= h(\Cake\Core\Configure::read('EEx.nome_reduzido')) ?>
</footer>