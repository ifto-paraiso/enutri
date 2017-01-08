<?php

$this->extend('/Common/default');

$this->assign('content-icon', 'exercicio');
$this->assign('content-title', 'Exercícios');

echo $this->fetch('content');