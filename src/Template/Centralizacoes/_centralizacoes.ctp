<?php

$this->extend('/Common/default');

$this->assign('content-icon',  'centralizacao');
$this->assign('content-title', 'Centralizações');

echo $this->fetch('content');
