<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

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