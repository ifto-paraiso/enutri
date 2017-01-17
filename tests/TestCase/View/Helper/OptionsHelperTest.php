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
