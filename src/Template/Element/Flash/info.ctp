<?php

$this->extend('/Element/Flash/default');
 
$this->assign('flash-icon',    'alert-info');
$this->assign('flash-title',   'Importante!');
$this->assign('flash-type',    'info');
$this->assign('flash-message', $message);
