<?php

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
