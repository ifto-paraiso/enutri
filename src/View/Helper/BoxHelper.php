<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

class BoxHelper extends Helper
{
    public $helpers = ['Html'];
    
    protected $styles = [
        'default' => 'box box-default',
        'primary' => 'box box-primary',
        'info'    => 'box box-info',
        'warning' => 'box box-warning',
        'success' => 'box box-success',
        'danger'  => 'box box-danger',
    ];
    
    public function create($options = [])
    {
        $defaultOptions = [
            'style' => 'default',
            'class' => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Configura o estilo do Box
        if (!array_key_exists($options['style'], $this->styles)) {
            $options['style'] = 'default';
        }
        $options['class'] = trim("{$this->styles[$options['style']]} {$options['class']}");
        unset($options['style']);
        
        return $this->Html->tag('div', null, $options);
    }
    
    public function bodyCreate($options = [])
    {
        
    }
    
    public function bodyEnd()
    {
        
    }
    
    public function end()
    {
        return '</div>';
    }
}