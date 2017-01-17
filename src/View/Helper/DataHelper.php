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
 * Helper para exibição de informações na forma de chave/valor
 * 
 */
class DataHelper extends Helper
{
    public $helpers = ['Html'];
    
    public function display($key, $value, array $options = [])
    {
        $defaultOptions = [
            'key'   => [],
            'value' => [],
            'class' => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        $defaultKeyOptions = [
            'class' => '',
        ];
        $keyOptions = array_merge($defaultKeyOptions, $options['key']);
        unset($options['key']);
        
        $defaultValueOptions = [
            'class' => '',
        ];
        $valueOptions = array_merge($defaultValueOptions, $options['value']);
        unset($options['value']);
        
        $keyOptions['class']   = trim('enutri-data-key '   . $keyOptions['class']);
        $valueOptions['class'] = trim('enutri-data-value ' . $valueOptions['class']);
        
        $keyHtml   = $this->Html->tag('div', $key,   $keyOptions);
        $valueHtml = $this->Html->tag('div', $value, $valueOptions);
        
        $options['class'] = trim('enutri-data ' . $options['class']);
        
        return $this->Html->tag('div', $keyHtml . $valueHtml, $options);
    }
}