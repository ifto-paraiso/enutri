<?php

$this->extend('/Element/Flash/default');
 
$this->assign('flash-icon',    'alert-danger');
$this->assign('flash-title',   'Erro!');
$this->assign('flash-type',    'danger');
$this->assign('flash-message', $message);