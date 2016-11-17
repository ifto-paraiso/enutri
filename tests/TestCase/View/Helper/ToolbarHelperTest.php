<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\ToolbarHelper;

class ToolbarHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new ToolbarHelper(new View());
    }
    
    public function testMake()
    {
        $this->assertEquals(
            '<div class="btn-toolbar"><div class="btn-group"><a href="#" class="btn btn-default">foo</a><a href="#" class="btn btn-default">bar</a></div><div class="btn-group"><a href="#" class="btn btn-default">example</a></div></div>',
            $this->helper->make([
                'groups' => [
                    array(
                        'buttons' => [
                            array(
                                'text' => 'foo',
                            ),
                            array(
                                'text' => 'bar',
                            ),
                        ],
                    ),
                    array(
                        'buttons' => [
                            array(
                                'text' => 'example'
                            )
                        ]
                    )
                ],
            ])
        );
    }
}