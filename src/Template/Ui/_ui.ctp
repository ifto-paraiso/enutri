<?php

$this->extend('/Web/content');
$this->assign('content-title', 'Interface com o usuário');

echo $this->fetch('content');
