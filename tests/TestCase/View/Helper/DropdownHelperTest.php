<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\DropdownHelper;

class DropdownHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new DropdownHelper(new View());
    }
    
    public function testMake()
    {
        $this->assertEquals(
            '<ul class="dropdown-menu extra"><li><a href="#foo"><i class="fooi"></i>foo</a></li><li class="divider"></li></ul>',
            $this->helper->make([
                'class' => 'extra',
                'items' => [
                    array(
                        'text' => 'foo',
                        'url'  => '#foo',
                        'icon' => 'fooi',
                    ),
                    array(
                        'type' => 'separator',
                    ),
                ],
            ])
        );
    }
}