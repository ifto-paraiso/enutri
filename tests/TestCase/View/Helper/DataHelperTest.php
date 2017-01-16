<?php

namespace Enutri\Test\TestCase\View\Helper;

use Cake\TestSuite\IntegrationTestCase;
use Cake\View\View;
use Enutri\View\Helper\DataHelper;

class DataHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new DataHelper(new View());
    }
    
    public function testDisplay()
    {
        $this->assertEquals(
            '<div class="enutri-data extra" tag="ok"><div class="enutri-data-key extrak" tag="keyt">foo</div><div class="enutri-data-value extrav" tag="valuet">bar</div></div>',
            $this->helper->display('foo', 'bar', [
                'class' => 'extra',
                'tag'   => 'ok',
                'key' => [
                    'class' => 'extrak',
                    'tag'   => 'keyt',
                ],
                'value' => [
                    'class' => 'extrav',
                    'tag'   => 'valuet'
                ]
            ])
        );
    }
}