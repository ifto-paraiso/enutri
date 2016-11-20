<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

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
                'type'   => 'default',
                'text'   => '',
                'url'    => '#',
                'icon'   => null,
                'escape' => false,
            ];
            $item = array_merge($defaultItemOptions, $item);
            
            $iconHtml = '';
            if (null !== $item['icon']) {
                $iconHtml = $this->Icon->make($item['icon']);
            }
            unset($item['icon']);
            
            $textHtml = $item['text'];
            unset($item['text']);
            
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