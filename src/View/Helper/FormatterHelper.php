<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

class FormatterHelper extends Helper
{
    public $helpers = ['Number'];
    
    protected $numberFormat = [
        'places' => 2,
        'precision' => 2,
        'locale' => 'pt_BR',
    ];
    
    public function float($value)
    {
        return $this->Number->format($value, $this->numberFormat);
    }
}