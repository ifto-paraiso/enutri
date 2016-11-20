<?php

$this->extend('/Common/default');
$this->assign('content-description', 'ButtonHelper');

?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">
                    ButtonHelper
                </h3>
            </div>
            <div class="box-body">
                             
                <?=
                    $this->ButtonGroup->make([
                        'buttons' => [
                            array(
                                'text' => 'Foo',

                                'dropdown' => [
                                    'items' => [
                                        array(
                                            'text' => 'dropdown1',
                                            'icon' => 'cadastrar',
                                        ),
                                        array(
                                            'type' => 'separator',
                                        ),
                                    ],
                                ],
                            )
                        ]
                    ])        
                ?>
                
            </div>
        </div>
    </div>
</div>