<?php

$this->extend('/Common/default');

$this->assign('content-icon', 'alimento');
$this->assign('content-title', 'Alimentos');

echo $this->fetch('content');