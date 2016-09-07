<?php

$this->extend('_ui');
$this->assign('content-description', 'IconHelper');

?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Helpers
                </h3>
            </div>
            <div class="box-body">
                <?= $this->Icon->make('glyphicon glyphicon-adjust') ?>
                <i class="glyphicon glyphicon-adjust"></i>
            </div>
        </div>
    </div>
</div>