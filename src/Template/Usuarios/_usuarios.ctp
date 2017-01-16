<?php

$this->extend('/Common/default');

$this->assign('content-icon', 'usuarios');
$this->assign('content-title', 'Usuários');

echo $this->fetch('content');