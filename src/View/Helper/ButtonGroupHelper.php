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
 * Helper para construção de grupos de botões
 * Utiliza a classe .btn-group do Twitter Bootstrap
 *
 */
class ButtonGroupHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html', 'Button'];
    
    /**
     * Constroi um grupo de botões
     * 
     * @param array $options
     * As chaves não reservadas são usadas como atributo/valor da tag
     * Chaves reservadas:
     * 'buttons'    Array com as opções dos botões
     * 
     * @return string HTML do grupo de botões
     */
    public function make($options)
    {
        // Configuração das chaves do array de opções
        $defaultOptions = [
            'buttons' => [],
            'class'   => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Construção do HTML dos botões
        $buttonsHtml = '';
        foreach ($options['buttons'] as $button) {
            $buttonsHtml .= $this->Button->make($button);
        }
        unset($options['buttons']);
        
        // Configuração da classe CSS do grupo
        $options['class'] = trim("btn-group {$options['class']}");
        
        // Constroi e retorna o HTML do grupo de botões
        return $this->Html->tag('div', $buttonsHtml, $options);
    }
}
