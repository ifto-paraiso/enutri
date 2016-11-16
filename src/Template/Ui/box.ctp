<?php

$this->extend('_ui');
$this->assign('content-description', 'BoxHelper');

echo $this->Box->create();

echo $this->Box->header([
    'text' => 'Título do header',
    'icon' => 'usuario',
    'toolbar' => [
        'groups' => [
            array(
                'buttons' => [
                    array(
                        'text' => 'Voltar',
                    ),
                ],
            ),
        ],
    ],
]);

echo $this->Box->body();

echo $this->Box->end();

?>