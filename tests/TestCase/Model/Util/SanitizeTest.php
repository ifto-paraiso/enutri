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

namespace Enutri\Test\TestCase\Model\Util;

use ArrayObject;
use Cake\TestSuite\IntegrationTestCase;
use Enutri\Model\Util\Sanitize;

class SanitizeTest extends IntegrationTestCase
{
    public function testTrimFields()
    {
        $var = new ArrayObject([
            'foo1' => 'bar1',
            'foo2' => '   bar2',
            'foo3' => 'bar3   ',
            'foo4' => '   bar4   ',
            'foo5' => '   bar5   ',
        ]);
        $var2 = clone($var);
        $trimmedvar = new ArrayObject([
            'foo1' => 'bar1',
            'foo2' => 'bar2',
            'foo3' => 'bar3',
            'foo4' => 'bar4',
            'foo5' => '   bar5   ',
        ]);
        $this->assertEquals(
            serialize($trimmedvar),
            serialize(Sanitize::trimFields($var, ['foo1', 'foo2', 'foo3', 'foo4']))
        );
        Sanitize::trimFields($var2, ['foo1', 'foo2', 'foo3', 'foo4']);
        $this->assertEquals(serialize($trimmedvar), serialize($var2));
    }
}
