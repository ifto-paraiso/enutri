<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

class OptionsHelper extends Helper
{
    public $helpers = ['Html', 'ButtonGroup'];
    
    public function make (array $options = [])
    {
        $buttons = [];
        foreach($options as $button) {
            $defaultButtonOptions = [
                'class' => 'btn-link btn-xs',
            ];
            $buttons [] = array_merge($defaultButtonOptions, $button);
        }
        
        return $this->ButtonGroup->make(['buttons' => $buttons]);
    }
}