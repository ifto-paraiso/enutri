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
 * Constroi botões
 * 
 */
class ButtonHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html', 'Icon', 'Dropdown'];
    
    /**
     * Constroi o botão
     * 
     * @param array $options
     * As chaves não reservadas serão inseridas como atributo/valor da tag
     * Chaves reservadas:
     * 'text'     Texto apresentado no botão
     * 'url       Href do botão  
     * 'icon'     Classe do ícone (ou alias). Veja o IconHelper
     * 'iconLeft' Se falso, o ícone será construído à direita do texto
     * 'tag'      Tipo da tag do botão (link, button)
     * 
     * @return
     */
    public function make($options)
    {
        /**
         * Opções default do botão
         * 
         * @var array
         */
        $defaultOptions = [
            'text'     => '',
            'class'    => 'btn-default',
            'url'      => '#',
            'icon'     => null,
            'iconLeft' => true,
            'tag'      => 'link',
            'escape'   => false,
            'dropdown' => null,
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        $options['class'] = trim('btn ' . $options['class']);
        
        // Configura o texto apresentado no botão
        $textHtml = $options['text'];
        unset($options['text']);
        
        // Configura a URL do botão...
        $url = $options['url'];
        unset($options['url']);
        
        // Configura o ícone do botão...
        $iconHtml = '';
        if (null !== $options['icon']) {
            $iconHtml = $this->Icon->make($options['icon']);
        }
        if (true === (bool) $options['iconLeft']) {
            $textHtml = $iconHtml . $textHtml;
        } else {
            $textHtml = $textHtml . $iconHtml;
        }
        unset($options['icon']);
        unset($options['iconLeft']);
        
        // Configura a tag do botão...
        $tag = $options['tag'];
        unset($options['tag']);
        
        // Configura o menu dropdown do botão
        $caretHtml    = '';
        $dropdownHtml = '';
        if (null !== $options['dropdown']) {
            $options['class'] = trim('dropdown-toggle ' . $options['class']);
            $options['data-toggle'] = 'dropdown';
            $caretHtml = '<span class="caret"></span>';
            $options['dropdown']['class'] = 'dropdown-menu-right';
            $dropdownHtml = $this->Dropdown->make($options['dropdown']);
        }
        unset($options['dropdown']);
        
        $textHtml .= $caretHtml;
        
        // Constroi e retorna o botão, de acordo com a tag desejada
        $buttonHtml = '';
        switch ($tag) {
            case 'a':
            case 'link':
                $buttonHtml = $this->makeLink($textHtml, $url, $options);
                break;
            case 'button':
                $buttonHtml = $this->makeButton($textHtml, $options);
                break;
        }
        
        $buttonHtml .= $dropdownHtml;
        
        return $buttonHtml;
    }
    
    protected function makeLink($text, $url, $options)
    {
        return $this->Html->link($text, $url, $options);
    }
    
    protected function makeButton($text, $options = [])
    {
        return $this->Html->tag('button', $text, $options);
    }
    
    public function submit($options = [])
    {
        $defaultOptions = [
            'text'  => 'Salvar',
            'type'  => 'submit',
            'icon'  => 'salvar',
            'style' => 'primary',
            'tag'   => 'button',
        ];
        $options = array_merge($defaultOptions, $options);
        return $this->make($text, $options);
    }
}