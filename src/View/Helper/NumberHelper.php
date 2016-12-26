<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

class NumberHelper extends Helper
{
    public function br($number)
    {
        return number_format($number, 2, ',', '.');
    }
}