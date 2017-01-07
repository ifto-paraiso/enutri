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
    
    public function float($value, array $options = [])
    {
        $options = array_merge($this->numberFormat, $options);
        return $this->Number->format($value, $options);
    }
    
    public function date(\DateTimeInterface $date)
    {
        return $date->i18nFormat('dd/MM/YYYY');
    }
    
    public function dateWeek(\DateTimeInterface $date)
    {
        return $date->i18nFormat("dd/MM/y '('E')'");
    }
    
    public function dateFull(\DateTimeInterface $date)
    {
        return $date->i18nFormat("dd 'de' MMMM 'de' y");
    }
}
