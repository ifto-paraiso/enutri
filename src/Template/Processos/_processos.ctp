<?php

$this->extend('/Common/default');

$this->assign('content-icon', 'processos');
$this->assign('content-title', 'Processos');

echo $this->fetch('content');
