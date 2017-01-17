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
 * Helper para construção de Toolbars
 * Utiliza a classe .btn-toolbar do Twitter Boostrap
 * 
 */
class ToolbarHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html', 'ButtonGroup'];
    
    /**
     * Constroi a toolbar
     * 
     * @param array $options Opções da toolbar
     * As chaves não reservadas serão utilizadas como atributo/valor da tag
     * Chaves reservadas:
     * 'groups':    Array com os grupos de botões
     * 
     * @return string HTML da Toolbar
     */
    public function make($options = [])
    {
        // Configura as opções default da toolbar
        $defaultOptions = [
            'groups' => [],
            'class'  => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Constroi o HTML dos grupos de botões
        $groupsHtml = '';
        foreach($options['groups'] as $group)
        {
            $groupsHtml .= $this->ButtonGroup->make($group);
        }
        unset($options['groups']);
        
        // Configura as classes CSS da toolbar
        $options['class'] = trim("btn-toolbar {$options['class']}");
        
        // Constroi e retorna o HTML da toolbar
        return $this->Html->tag('div', $groupsHtml, $options);
    }
}