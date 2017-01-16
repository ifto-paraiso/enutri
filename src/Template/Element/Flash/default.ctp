
<div class="flash alert alert-dismissible alert-<?= $this->fetch('flash-type') ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>
        <?= $this->Icon->make($this->fetch('flash-icon')) ?>
        <?= $this->fetch('flash-title') ?>
    </h4>
    <?= $this->fetch('flash-message') ?>
</div>
