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
use Enutri\View\Helper\BoxHelper;

class BoxHelperTest extends IntegrationTestCase
{
    public $helper;
    
    public function setUp()
    {
        parent::setUp();
        $this->helper = new BoxHelper(new View());
    }
    
    public function testSetBodyOpened()
    {
        // Set true
        $this->helper->setBodyOpened(true);
        $this->assertTrue($this->helper->isBodyOpened());
        
        // set false
        $this->helper->setBodyOpened(false);
        $this->assertFalse($this->helper->isBodyOpened());
    }
    
    public function testCreate()
    {
        // Abertura da Box default
        $this->assertEquals(
            '<div class="box box-default">',
            $this->helper->create()
        );
        
        // Abertura da Box alterando a classe CSS default
        $this->assertEquals(
            '<div class="box box-warning">',
            $this->helper->create([
                'class' => 'box-warning',
            ])
        );
    }
    
    public function testHeader()
    {
        // Header default
        $this->assertEquals(
            '<div class="box-header"><h3 class="box-title"></h3></div>',
            $this->helper->header()
        );
        
        // Header com titulo
        $this->assertEquals(
            '<div class="box-header"><h3 class="box-title">BoxTitle</h3></div>',
            $this->helper->header([
                'text' => 'BoxTitle',
            ])
        );
        
        // Header com ícone
        $this->assertEquals(
            '<div class="box-header"><h3 class="box-title"><i class="fa fa-user"></i></h3></div>',
            $this->helper->header([
                'icon' => 'fa fa-user',
            ])
        );
        
        // Header com ícone e título
        $this->assertEquals(
            '<div class="box-header"><h3 class="box-title"><i class="fa fa-user"></i>BoxTitle</h3></div>',
            $this->helper->header([
                'icon' => 'fa fa-user',
                'text' => 'BoxTitle',
            ])
        );
        
        // Header com toolbar
        $this->assertEquals(
            '<div class="box-header"><h3 class="box-title"></h3><div class="box-tools"><div class="btn-toolbar"><div class="btn-group"><a href="#" class="btn btn-default">ButtonText</a></div></div></div></div>',
            $this->helper->header([
                'toolbar' => [
                    'groups' => [
                        array(
                            'buttons' => [
                                array(
                                    'text' => 'ButtonText',
                                ),
                            ],
                        ),
                    ],
                ],
            ])
        );
    }
    
    public function testBody()
    {
        $this->helper->setBoxOpened(true);
        $this->helper->setBodyOpened(false);
        
        // Body default
        $this->assertEquals(
            '<div class="box-body">',
            $this->helper->body()
        );
        
        // Verifica se o helper foi definido como body aberto
        $this->assertTrue($this->helper->isBodyOpened());
        
        $this->helper->setBodyOpened(false);
        
        // Body default com classe adicional
        $this->assertEquals(
            '<div class="box-body foo">',
            $this->helper->body(['class' => 'foo'])
        );
        
        // Verifica se o helper foi definido como body aberto
        $this->assertTrue($this->helper->isBodyOpened());
    }
    
    public function testBodyEnd()
    {     
        $this->helper->setBoxOpened(true);
        $this->helper->setBodyOpened(true);
        
        // Body end default
        $this->assertEquals(
            '</div>',
            $this->helper->bodyEnd()
        );
    }
    
    public function testEnd()
    {
        // Box fechada sem abrir o body
        $this->helper->setBoxOpened(true);
        $this->helper->setBodyOpened(false);
        $this->assertEquals('</div>', $this->helper->end());
        
        // Box fechada com body aberto
        $this->helper->setBoxOpened(true);
        $this->helper->setBodyOpened(true);
        $this->assertEquals('</div></div>', $this->helper->end());
    }
}