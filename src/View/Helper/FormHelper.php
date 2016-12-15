<?php

namespace Enutri\View\Helper;

use Cake\View\Helper\FormHelper as CakeFormHelper;
use Cake\View\View;

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