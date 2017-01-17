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
use Enutri\View\Helper\ButtonHelper;

class ButtonHelperTest extends IntegrationTestCase
{
    protected $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new ButtonHelper(new View());
    }
    
    public function testMake()
    {
        // Botão default construído como link
        $this->assertEquals(
            '<a href="#" class="btn btn-default">Default</a>',
            $this->helper->make([
                'text' => 'Default',
            ])
        );
        
        // Botão default construído como link, alterando-se a classe CSS
        $this->assertEquals(
            '<a href="#" class="btn btn-flat btn-danger">Default</a>',
            $this->helper->make([
                'text'  => 'Default',
                'class' => 'btn-flat btn-danger',
            ])
        );
        
        // Botão default construído como link com ícone à esquerda
        $this->assertEquals(
            '<a href="#" class="btn btn-default"><i class="fa fa-user"></i>Default</a>',
            $this->helper->make([
                'text' => 'Default',
                'icon' => 'fa fa-user',
            ])
        );
        
        // Botão default construído como link com ícone à direita
        $this->assertEquals(
            '<a href="#" class="btn btn-default">Default<i class="fa fa-user"></i></a>',
            $this->helper->make([
                'text'     => 'Default',
                'icon'     => 'fa fa-user',
                'iconLeft' => false,
            ])
        );
        
        // Botão default construído com a tag <button>
        $this->assertEquals(
            '<button class="btn btn-default">Default</button>',
            $this->helper->make([
                'text' => 'Default',
                'tag'  => 'button',
            ])
        );
        
        // Botão default construído com a tag <button>, com ícone à esquerda
        $this->assertEquals(
            '<button class="btn btn-default"><i class="fa fa-user"></i>Default</button>',
            $this->helper->make([
                'text' => 'Default',
                'tag'  => 'button',
                'icon' => 'fa fa-user',
            ])
        );
        
        // Botão default construído com a tag <button>, com ícone à direita
        $this->assertEquals(
            '<button class="btn btn-default">Default<i class="fa fa-user"></i></button>',
            $this->helper->make([
                'text'     => 'Default',
                'tag'      => 'button',
                'icon'     => 'fa fa-user',
                'iconLeft' => false,
            ])
        );
        
        // Botão default construído como link, com URL expressa
        $this->assertEquals(
            '<a href="http://localhost/" class="btn btn-default">Default</a>',
            $this->helper->make([
                'text' => 'Default',
                'url'  => 'http://localhost/',
            ])
        );
        
        // Botão default construído como link, com URL construída com o UrlHelper
        $this->assertEquals(
            '<a href="/foo/bar/xx" class="btn btn-default">Default</a>',
            $this->helper->make([
                'text' => 'Default',
                'url'  => ['controller' => 'foo', 'action' => 'bar', 'xx'],
            ])
        );
        
        // Botão com menu dropdown
        $this->assertEquals(
            '<a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Foo<span class="caret"></span></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#"><i class="icon"></i>dropdown1</a></li><li class="divider"></li></ul>',
            $this->helper->make([
                'text' => 'Foo',
                'dropdown' => [
                    'items' => [
                        array(
                            'text' => 'dropdown1',
                            'icon' => 'icon',
                        ),
                        array(
                            'type' => 'separator',
                        ),
                    ],
                ],
            ])
        );
    }
}