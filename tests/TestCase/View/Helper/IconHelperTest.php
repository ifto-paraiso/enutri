<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\IconHelper;

class IconHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new IconHelper(new View());
    }
    
    public function testMake()
    {
        $this->assertEquals(
            '<i class="fa fa-user foo"></i>',
            $this->helper->make('fa fa-user', ['class' => 'foo'])
        );
        
        $this->helper->setAliases(['foo' => 'bar']);
        
        $this->assertEquals(
            '<i class="bar extra"></i>',
            $this->helper->make('foo', ['class' => 'extra'])
        );
    }
}