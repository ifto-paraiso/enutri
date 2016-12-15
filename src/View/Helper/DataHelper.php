<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

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