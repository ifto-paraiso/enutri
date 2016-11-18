<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\OptionsHelper;

class OptionHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new OptionsHelper(new View());
    }
    
    public function testMake()
    {
        $this->assertEquals(
            '<div class="btn-group"><a href="#fool" class="btn btn-link btn-xs"><i class="fooi"></i></a><a href="#barl" class="btn btn-link btn-xs"><i class="bari"></i></a></div>',
            $this->helper->make([
                array(
                    'icon' => 'fooi',
                    'url'  => '#fool',
                ),
                array(
                    'icon' => 'bari',
                    'url'  => '#barl',
                )
            ])
        );
    }
}
