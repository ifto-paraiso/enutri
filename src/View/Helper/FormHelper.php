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

use Cake\View\Helper\FormHelper as CakeFormHelper;
use Cake\View\View;

/**
 * Melhorias no form helper do cakephp
 * 
 */
class FormHelper extends CakeFormHelper
{
    public function __construct(View $View, array $config = array())
    {
        $this->helpers[] = 'Button';
        parent::__construct($View, $config);
    }
    
    public function salvar($options = [])
    {
        $defaultOptions = [
            'text'  => 'Salvar',
            'icon'  => 'salvar',
            'class' => 'btn-primary',
            'tag'   => 'button',
            'type'  => 'submit',
        ];
        $options = array_merge($defaultOptions, $options);
        
        return $this->Button->make($options);
    }
}