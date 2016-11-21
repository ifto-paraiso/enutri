<?php

$this->extend('/Common/default');

$this->assign('content-icon', 'uex');
$this->assign('content-title', 'Unidades Executoras');

echo $this->fetch('content');