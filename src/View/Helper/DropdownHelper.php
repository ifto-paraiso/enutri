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
 * Helper para construção de menus dropdown
 * 
 */
class DropdownHelper extends Helper
{
    public $helpers = ['Html', 'Icon'];
    
    public function make(array $options = [])
    {
        $defaultOptions = [
            'class' => '',
            'items' => [],
        ];
        $options = array_merge($defaultOptions, $options);
        
        $options['class'] = trim('dropdown-menu ' . $options['class']);
        
        $itemsHtml = '';
        foreach ($options['items'] as $item) {
            $defaultItemOptions = [
                'type'    => 'default',
                'text'    => '',
                'url'     => '#',
                'icon'    => null,
                'escape'  => false,
                'confirm' => null,
                'target'  => null,
            ];
            $item = array_merge($defaultItemOptions, $item);
            
            $iconHtml = '';
            if (null !== $item['icon']) {
                $iconHtml = $this->Icon->make($item['icon']);
            }
            unset($item['icon']);
            
            $textHtml = $item['text'];
            unset($item['text']);
            
            $confirm = $item['confirm'];
            unset($item['confirm']);
            
            $target = $item['target'];
            unset($item['target']);
            
            $type = $item['type'];
            unset($item['type']);
            
            $url = $item['url'];
            unset($item['url']);

            if ('separator' === $type) {
                $item['class'] = 'divider';
                $itemsHtml .= $this->Html->tag('li', '', $item);
            } else {
                $linkOptions = [
                    'escape' => false,
                ];
                if (null !== $confirm) {
                    $linkOptions['confirm'] = $confirm;
                }
                if (null !== $target) {
                    $linkOptions['target'] = $target;
                }
                $itemsHtml .= $this->Html->tag(
                    'li',
                    $this->Html->link($iconHtml . $textHtml, $url, $linkOptions),
                    $item
                );
            }
        }
        unset($options['items']);
        
        return $this->Html->tag('ul', $itemsHtml, $options);
    }
}