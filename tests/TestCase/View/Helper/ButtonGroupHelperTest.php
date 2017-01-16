<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\ButtonGroupHelper;

class ButtonGroupHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new ButtonGroupHelper(new View());
    }
    
    public function testMake()
    {
        $this->assertEquals(
            '<div class="btn-group"><a href="#" class="btn btn-default">foo</a><a href="#" class="btn btn-default">bar</a></div>',
            $this->helper->make([
                'buttons' => [
                    array(
                        'text' => 'foo',
                    ),
                    array(
                        'text' => 'bar',
                    ),
                ],
            ])
        );
    }
}