<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

class ButtonGroupHelper extends Helper
{
    
    public $helpers = ['Html', 'Button'];
    
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
        
        return $this->Html->tag('div', $buttonsHtml, $options);
    }
}
