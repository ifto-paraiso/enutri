<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

class LabelHelper extends Helper
{
    public $helpers = ['Html'];
    
    public function make(array $options = [])
    {
        $defaultOptions = [
            'text' => '',
            'class' => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        $text = $options['text'];
        unset($options['text']);
        
        $options['class'] = trim("label {$options['class']}");
        
        return $this->Html->tag('span', $text, $options);
    }
    
    public function __call($method, $params)
    {
        $options = [
            'class' => "label-{$method}",
            'text'  => $params[0],
        ];
        return $this->make($options);
    }
}
