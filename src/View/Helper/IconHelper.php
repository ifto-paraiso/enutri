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

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Helper para construção de ícones
 * 
 */
class IconHelper extends Helper
{
    /**
     * Classes CSS dos ícones padronizados
     * 
     * @var array
     */
    private $aliases = [];
    
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html'];
    
    /**
     * Inicializador da classe
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $defaultConfig = [
            'aliases' => null,
        ];
        $config = array_merge($defaultConfig, $config);
        if (null !== $config['aliases']) {
            $this->setAliases($config['aliases']);
        }
    }
    
    public function setAliases(array $aliases = [])
    {
        $this->aliases = $aliases;
    }
       
    /**
     * Constrói um ícone
     * 
     * @param string $class Classe CSS ou alias do ícone
     * @param array $options Array com as demais opções
     * 
     * @return string HTML do ícone
     */
    public function make($class, $options = [])
    {
        if (isset($this->aliases[$class])) {
            $class = $this->aliases[$class];
        }
        
        $defaultOptions = [
            'class' => '',
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        $options['class'] = trim("{$class} {$options['class']}");
        
        return $this->Html->tag('i', '', $options);
    }
}