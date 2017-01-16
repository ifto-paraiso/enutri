<?php

$this->extend('/Element/Flash/default');
 
$this->assign('flash-icon',    'alert-success');
$this->assign('flash-title',   'Sucesso!');
$this->assign('flash-type',    'success');
$this->assign('flash-message', $message);
