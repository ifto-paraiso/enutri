<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\FormHelper;

class FormHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new FormHelper(new View());
    }
    
    public function testSalvar()
    {
        $this->assertEquals(
            '<button class="btn btn-primary" type="submit"><i class="icon-test"></i>Salvar</button>',
            $this->helper->salvar([
                'icon' => 'icon-test',
            ])
        );
    }
}