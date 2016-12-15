<?php

$this->extend('/Element/Flash/default');
 
$this->assign('flash-icon',    'alert-warning');
$this->assign('flash-title',   'Atenção!');
$this->assign('flash-type',    'warning');
$this->assign('flash-message', $message);
